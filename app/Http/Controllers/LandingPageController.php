<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RequestFile;
use App\Product;

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
    	return view('product', compact('product'));
    }

    public function view($id)
    {
    	$req_file = RequestFile::findOrFail($id);
    	return view('view-file', compact('req_file'));
    }
}
