<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RequestFile;
use App\Service\FileManager;
use App\PaperSize;
use App\PrintType;
use DB;

class RequestFilesController extends Controller
{
    public function __construct()
    {
        $this->fileManager = new FileManager;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = RequestFile::all();

        return view('pages.admin.files.index', compact('resources'));
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

            //PORCESS FILE
            if($request->hasFile('file')){

                $file = $request->file;
                $filename = rand().'.'.$file->getClientOriginalExtension();
                $file->storeAs('files\documents', $filename);
            }

            //STORE REQUEST FILES
            RequestFile::create($this->fileManager->data($request->toArray(), $filename));
            
        } catch (Exception $e) {
            
            DB::roleback();

            return redirect('/');
        }

        DB::commit();

        return 'files uploaded successfully';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->file($this->fileManager->path($id));
    }
    public function download($id)
    {
        return response()->download($this->fileManager->path($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $file           = RequestFile::findOrFail($id);
        $paper_sizes    = PaperSize::all();
        $print_types    = PrintType::all();
        $price_per_page = $this->computePricePage($file);
        $subtotal       = $this->computeSubtotal($file);
        $total          = $this->computeTotalPrice($file);

        return view('pages.admin.files.edit', compact(
            'file', 
            'paper_sizes', 
            'print_types',
            'price_per_page',
            'subtotal',
            'total'
        ));
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
        $num_of_page = number_format($request->num_of_page);

        //find file
        $file = RequestFile::findOrFail($id);
        //total price
        $total = $this->computePricePage($file) * $num_of_page;
        //update file request
        $file->update(['number_of_page' => $num_of_page, 'total_price' => $total]);

        return back();
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

    public function computePricePage($file)
    {
        return number_format($file->size->presentPrice() + $file->type->presentPrice(), 2);
    }
    public function computeSubtotal($file)
    { 

        if($file->number_of_page > 1){

            return number_format($file->number_of_page * $this->computePricePage($file), 2);

        }else{

            return number_format($file->size->presentPrice() + $file->type->presentPrice(), 2);
        }
    }
    public function computeTotalPrice($file)
    {
        $subtotal = $this->computeSubtotal($file);
        $tax = 10.34;
        $shipping = 5.80;

        $total = $subtotal + $tax + $shipping;

        return number_format($total, 2);
    }

}
