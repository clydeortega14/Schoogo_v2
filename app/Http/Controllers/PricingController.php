<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pricings;
use App\Product;
use App\Size;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pricings = Pricings::all();
        return view('pages.admin.pricings.index', compact('pricings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::where('status', true)->get();
        $sizes = Size::all();
        return view('pages.admin.pricings.create', compact('products', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pricings::create($request->all());
        return redirect()->route('pricings.index')->with('success', 'new pricing has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pricing = Pricings::findOrFail($id);
        $pricings = Pricings::all();
        $products = Product::where('status', true)->get();
        $sizes = Size::all();

        return view('pages.admin.pricings.create', compact('pricing', 'pricings', 'products', 'sizes'));
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
        Pricings::where('id', $id)->update([
            'product_id' => $request->input('product_id'),
            'category_id' => $request->input('category_id'),
            'size' => $request->input('size'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
        ]);

        return redirect()->route('pricings.index')->with('success', 'Pricing successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pricings::where('id', $id)->delete();
        return redirect()->route('pricings.index')->with('success', 'Deleted');
    }
}
