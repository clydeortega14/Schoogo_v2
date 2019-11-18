<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('pages.admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            
            $filename = '';

            if($request->hasFile('image')){

                $file = $request->file('image');
                $filename = rand().".".$file->getClientOriginalExtension();
                $file->storeAs('images\products', $filename);
            }

            $product = Product::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'image' => $filename,
                'status' => true
            ]);


        } catch (Exception $e) {

            DB::rollBack();

            return back();
        }

        DB::commit();

        return redirect()->route('products.index')->with('success', 'New product has been added');
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
        $product = Product::findOrFail($id);

        return view('pages.admin.products.edit', compact('product'));
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
        $product = Product::findOrFail($id);

        DB::beginTransaction();

        try {

            $filename = $product->image;

            if($request->hasFile('image')){

                $file = $request->file('image');
                $filename = rand().".".$file->getClientOriginalExtension();
                $file->storeAs('images\products', $filename);
            }

            $product->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'image' => $filename,
            ]);
            
        } catch (Exception $e) {
            
            DB::rollBack();

            return back();
        }

        DB::commit();

        return redirect()->route('products.index')->with('success', 'Product successfully updated');
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

    public function productCategories($id)
    {
        $product = Product::findOrFail($id);
        dd($product->categories);
        return response()->json($product->categories);
    }
}
