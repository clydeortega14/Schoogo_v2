<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderStatus;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('pages.admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user  = auth()->user();

        $order = Order::findOrFail($id);
        $statuses = OrderStatus::all();

        if($user->role_id == 1){

            return view('pages.admin.orders.show', compact('order', 'statuses'));
        }else{

            return view('pages.users.show', compact('order'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Order::where('id', $id)->update(['order_status_id' => $request->input('status')]);
        return redirect()->route('home')->with('success', 'Order has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function viewFile($id)
    {
        $order = Order::findOrFail($id);
        $pathToFile = public_path('/uploads/files/documents/'.$order->file); 
        return response()->file($pathToFile);
    }
    public function downloadFile($id)
    {
        $order = Order::findOrFail($id);
        $path = public_path('/uploads/files/documents/'.$order->file);
        return response()->download($path);
    }
}
