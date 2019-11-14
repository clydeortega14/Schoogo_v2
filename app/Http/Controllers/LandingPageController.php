<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RequestFile;
use App\Product;
use App\Quantity;
use App\Pricings;

class LandingPageController extends Controller
{
    public function index()
    {
    	$products = Product::all();

    	return view('welcome', compact('products'));
    }

    public function about()
    {
    	return view('about-us');
    }

    public function viewProduct($id)
    {
    	$product = Product::findOrFail($id);
        $quantities = Quantity::all();

    	return view('product', compact('product', 'quantities'));
    }

    public function getPrice($size, $qty)
    {
        $price = Pricings::where('size', $size)->where('quantity', $qty)->first();

        if($price){
            return response()->json(number_format($price->price, 2));
        }else{
            return response()->json('no price available');
        }
    }
}
