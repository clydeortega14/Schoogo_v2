<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Size;
use App\Product;
use App\Categories;
use Illuminate\Support\Facades\DB;

class SizesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::all();

        return view('pages.admin.sizes.index', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::where('status', true)->get();

        return view('pages.admin.sizes.create', compact('products'));
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

            Size::create($this->data($request->toArray()));
            
        } catch (Exception $e) {
            
            DB::rollBack();

            return redirect()->route('products.edit', $request->input('product_id'));
        }

        DB::commit();

        return redirect()->route('size.index')->with('success', 'new Product size has been created');
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
        $size = Size::findOrFail($id);
        $products = Product::where('status', true)->get();

        return view('pages.admin.sizes.create', compact('size', 'products'));
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

        DB::beginTransaction();

        try {

            Size::where('id', $id)->update($this->data($request->toArray()));
            
        } catch (Exception $e) {
            
            DB::rollBack();

            return back();
        }

        DB::commit();

        return redirect()->route('size.index')->with('success', 'size has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {

            Size::where('id', $id)->delete();
            
        } catch (Exception $e) {
            
            DB::rollBack();

            return back();
        }

        DB::commit();

        return redirect()->route('size.index')->with('success', 'size has been deleted');
    }
    public function getCategories($prodId)
    {
        $categories = Categories::where('product_id', $prodId)->with('products')->get();

        return response()->json($categories);
    }
    protected function data(Array $data)
    {
        return [

            'product_id' => $data['product_id'],
            'category_id' => $data['category_id'],
            'size' => $data['size'],
        ];
    }
}
