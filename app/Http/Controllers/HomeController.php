<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();

        if($user->role_id == 1){

            $orders = Order::orderBy('created_at', 'desc')->get();
            $products = Product::where('status', true)->get();
            return view('home', compact('orders', 'products'));
            
        }else if($user->role_id == 2){

            $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
            return view('pages.users.profile', compact('orders'));
        } 
    }
}
