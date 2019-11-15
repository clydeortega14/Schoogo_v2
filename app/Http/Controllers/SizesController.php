<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaperSize;
use App\Product;
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
        //
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
        DB::beginTransaction();

        try {

            PaperSize::create([
                'prod_id' => $request->input('product_id'),
                'size' => $request->input('size')
            ]);
            
        } catch (Exception $e) {
            
            DB::rollBack();

            return redirect()->route('products.edit', $request->input('product_id'));
        }

        DB::commit();

        return redirect()->route('products.edit', $request->input('product_id'))->with('success', 'new Product size has been created');
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
        $size = PaperSize::findOrFail($id);
        $product = Product::findOrfail($size->prod_id);

        return view('pages.admin.products.edit', compact('size', 'product'));
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
        $size = PaperSize::findOrFail($id);

        DB::beginTransaction();

        try {

            $size->update([

                'size' => $request->input('size')
            ]);
            
        } catch (Exception $e) {
            
            DB::rollBack();

            return back();
        }

        DB::commit();

        return redirect()->route('products.edit', $size->prod_id);
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
}
