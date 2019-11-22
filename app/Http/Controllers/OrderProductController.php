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
use App\Size;
use App\Categories;
use Illuminate\Support\Facades\DB;

class OrderProductController extends Controller
{
    public function checkout(Request $req)
    {
        $session = $req->session()->get('data');
        if($session['price'] == null){
            return back()->with('message', 'Pricing not available');
        }

        $pricing = pricings::where('size', $session['size'])
        ->where('quantity', $session['quantity'])
        ->first();

        $product  = Product::findOrFail($session['product_id']);
        $category = Categories::findOrFail($session['category_id']);

        return view('guest-detail', compact('session','pricing', 'category', 'product'));
    }

    public function orderNow(Request $request, $id)
    {
        $pricing = Pricings::findOrFail($id);
        $session = $request->session()->get('data');

        DB::beginTransaction();

        try {

            //MUST CREATE DELIVERY ADDRESS FIRST
            $deliver_address = $this->createDeliverAddress($request->toArray());

                Order::create([
                    'or_number' => $this->genOrNumber(),
                    'product_id' => $request->input('product_id'),
                    'pricing_id' => $pricing->id,
                    'user_id' => auth()->user()->id,
                    'file' => $session[0],
                    'price' => $pricing->price,
                    'deliver_to' => $deliver_address->id,
                    'order_status_id' => 1
                ]);
            
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

            'complete_address' => $data['complete_address'],
            'contact_person' => $data['contact_person'],
            'contact_number' => $data['contact_number']
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
}
