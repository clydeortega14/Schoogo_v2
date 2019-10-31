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
        $sizes    = PaperSize::all();
        $types    = PrintType::all();

        return view('pages.admin.files.create', compact('sizes', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this->validate($request, [
            'file_to_upload' => 'required',
            'doc_title' => 'required',
            'doc_summary' => 'required',
            'paper_size_id' => 'required',
            'print_type_id' => 'required'
        ]);

        //transaction
        DB::beginTransaction();

        try {

            $filename = '';
            //PORCESS FILE
            if($request->hasFile('file_to_upload')){

                $file = $request->file_to_upload;
                $filename = rand().'.'.$file->getClientOriginalExtension();
                $file->storeAs('files\documents', $filename);
            }
            //STORE REQUEST FILES
            $file = RequestFile::create($request->all()+['user_id' => auth()->user()->id, 'uploaded_file' => $filename, 'docs_status_id' => 1]);
            
        } catch (Exception $e) {
            
            DB::rollBack();

            return redirect()->route('request-files.create')->with('error', $e->getMessage());
        }

        DB::commit();

        return redirect()->route('request-files.edit', $file->id)->with('success', 'New Request has been created');
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

    public function updateDocStatus(Request $request, $id)
    {
        $file = RequestFile::findOrFail($id);

        if($request->has('approve')){

            $file->update(['docs_status_id' => 4]);

        }else if($request->has('disapprove')){

            $file->update(['docs_status_id' => 7]);
        }

        return back()->with('success', 'you have'.' '.$file->docsStatuses->name.' '.'this request');
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
