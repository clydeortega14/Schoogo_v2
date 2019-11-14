<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Pricings;
use App\Quantity;
use App\PaperSize;
use App\Paper;
use App\Order;
use App\DeliverAddress;
use Illuminate\Support\Facades\DB;

class OrderProductController extends Controller
{
    public function checkout(Request $req, $id)
    {
       $pricing = $this->getPricing($req->input('size'), $req->input('quantity'));
       $product = Product::findOrFail($id);
       $size    = PaperSize::findOrFail($req->input('size'));
       $paper   = $this->getPaper($req->input('paper'));
       $quantity = Quantity::findOrFail($req->input('quantity'));

       if(is_null($pricing)){

            return back()->with('message', 'Pricing not available');
       }

       $total_price = $this->computeTotalPrice($pricing->price, $paper->price);

       //order data
       $orderData = $this->orderData($product->id, $pricing->id, $size->id, $paper->id, $quantity->id, $total_price);

       //session data
       $sessionData = [

            'product' => $product->name,
            'size'    => $size->size,
            'paper'   => $paper->name.' - '.$paper->gsm,
            'quantity' => $quantity->quantity,
       ];

       return view('guest-detail', compact('orderData', 'sessionData'));
    }

    public function orderNow(Request $request)
    {


        $pricing  = $this->getPricing($request->input('size'), $request->input('quantity'));
        $paper = $this->getPaper($request->input('paper_id'));

        DB::beginTransaction();

        try {

            //MUST CREATE DELIVERY ADDRESS FIRST
            $deliver_address = $this->createDeliverAddress($request->toArray());
            $filename = '';

            if($deliver_address){

                if($request->hasFile('file')){

                    $filename = $this->processFile($request->file('file'));
                }

                Order::create([
                    'or_number' => $this->genOrNumber(),
                    'product_id' => $request->input('product_id'),
                    'pricing_id' => $pricing->id,
                    'paper_id' => $request->input('paper_id'),
                    'file' => $filename,
                    'price' => $this->computeTotalPrice($pricing->price, $paper->price),
                    'deliver_to' => $deliver_address->id,
                    'order_status_id' => 1
                ]);

            }
            
        } catch (Exception $e) {
            
            DB::rollBack();

            return back();    
        }

        DB::commit();

        return redirect('/')->with('success', 'You have purchased new order');
    }

    protected function getPaper($id)
    {
        return Paper::findOrFail($id);
    }

    protected function createDeliverAddress(Array $data)
    {
        return DeliverAddress::create([

            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'contact' => $data['contact'],
            'country' => $data['country'],
            'state' => $data['state'],
            'city' => $data['city'],
            'street' => $data['street']
        ]);
    }

    protected function genOrNumber()
    {
        //generate ornumber
        $or_number = '';
        //get latest order
        $latest_order = Order::orderBy('created_at', 'desc')->first();

        if($latest_order == null){
            $or_number = '#'.str_pad(1, 6, "0", STR_PAD_LEFT);
        }else{
            $or_number = '#'.str_pad($latest_order->id + 1, 6, "0", STR_PAD_LEFT);
        }
        return $or_number;
    }
    protected function processFile($file)
    {
        $filename = rand().'.'.$file->getClientOriginalExtension();
        $file->storeAs('files\documents', $filename);

        return $filename;
    }
    protected function getPricing($size, $qty)
    {
        return Pricings::where('size', $size)->where('quantity', $qty)->first();
    }
    protected function orderData($prodId, $priceId, $sizeId, $paperId, $qtyId, $price)
    {
        return [

            'product_id' => $prodId,
            'pricing'    => $priceId,
            'size_id'    => $sizeId,
            'paper_id'   => $paperId,
            'quantity'   => $qtyId,
            'price'      => $price
       ];
    }

    protected function computeTotalPrice($price, $paper)
    {
        return $price + $paper;
    }
    
}
