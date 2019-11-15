<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\FileManager;
use Illuminate\Support\Facades\DB;
use App\Categories;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->file_manager = new FileManager;
        $this->category = new Categories;
    }
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

            $filename = '';

            if($request->hasFile('image')){

                $filename = $this->file_manager->manageFile($request->file('image'), 'images\categories');
            }

            Categories::create($this->category->data($request->toArray(), $filename));
            
        } catch (Exception $e) {

            DB::rollBack();

            return redirect()->route('products.edit', $request->input('product_id'));
        }

        DB::commit();

        return redirect()->route('products.edit', $request->input('product_id'));
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
        $category = Categories::findOrFail($id);

        DB::beginTransaction();

        try {

            $filename = $category->image;

            if($request->hasFile('image')){

                $filename = $this->file_manager->manageFile($request->file('image'), 'images\categories');
            }

            $category->update($this->category->data($request->toArray(), $filename));
            
        } catch (Exception $e) {
            
            DB::rollBack();

            return redirect()->route('products.edit', $category->product_id);
        }

        DB::commit();

        return redirect()->route('products.edit', $category->product_id)->with('success', 'category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categories::findOrFail($id);
        
        DB::beginTransaction();
        try {

            $this->category->where('id', $id)->delete();
            
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->route('products.edit', $category->product_id);        
        }

        DB::commit();

        return redirect()->route('products.edit', $category->product_id)->with('danger', 'You delete a category');


    }
    public function updateStatus($id)
    {
        $category = Categories::findOrFail($id);

        DB::beginTransaction();

        try {

            if($category->status == 0){

                $this->category->where('id', $id)->update(['status' => 1]);

            }else{

                $this->category->where('id', $id)->update(['status' => 0]);

            }
            
        } catch (Exception $e) {
            
            DB::rollBack();

            return $e->getMessage();
        }

        DB::commit();

        return redirect()->route('products.edit', $category->product_id)->with('success', 'status has been updated');
    }

}
