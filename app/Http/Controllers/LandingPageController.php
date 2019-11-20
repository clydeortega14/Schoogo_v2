<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Size;
use App\Product;
use App\Pricings;
use App\Categories;
use Session;
use App\Service\FileManager;

class LandingPageController extends Controller
{
    public function __construct()
    {
        $this->file_manager = new FileManager;
    }
    public function index()
    {
    	$products = Product::all();
    	return view('welcome', compact('products'));
    }
    public function uploadDesign(Request $request){
        $storedData = $request->session()->put('data', $request->all());
        $sizes = Size::all();
        return view('upload-design')
        ->with('sessionData', $request->session()->get('data', $storedData))
        ->with('sizes', $sizes);
    }
    public function checkout(Request $request)
    {

        $filename = '';
        if($request->hasFile('file')){
            $filename = $this->file_manager->manageFile($request->file('file'), 'files\documents');
        }
        $request->session()->push('data', $filename);
        $session = $request->session()->get('data');

        $product = Product::findOrFail($session['product_id']);
        $sizes = Size::all();
        return view('product-options')
        ->with('product', $product)
        ->with('sizes', $sizes)
        ->with('sessionData', $request->session()->get('data'));
        
    }
    public function about()
    {
    	return view('about-us');
    }
    public function productCategories($prodId)
    {
        $product = Product::findOrFail($prodId);
        return view('product-categories', compact('product'));
    }
    public function priceCalculation($prodId, $categoryId)
    {
        $product = Product::findOrFail($prodId);
        $category = Categories::findOrFail($categoryId);
        $sizes = Size::where(function($query) use ($category, $prodId){
            if(count($category->sizes) > 0){
                $query->where('product_id', $prodId)
                ->where('category_id', $category->id);
            }else{
                $query->where('product_id', $prodId);
            }

        })->get();
    	return view('product', compact('product', 'sizes', 'category'));
    }

    public function getPrice($prod_id, $category_id, $size, $qty)
    {
        $price = Pricings::where('product_id', $prod_id)
        ->where('category_id', $category_id)
        ->where('size', $size)
        ->where('quantity', $qty)
        ->first();
        
        $total_price = 0;
        if($price){
            $total_price = number_format($price->price, 2); 
            return response()->json($total_price);
        }else{
            return response()->json($total_price);
        }
    }
    public function getQuantities($sizeId)
    {
        $pricings = Pricings::where('size', $sizeId)->get();

        return response()->json($pricings);
    }
}
