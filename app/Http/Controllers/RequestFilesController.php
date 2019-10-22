<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RequestFile;
use App\Service\FileManager;
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
        $file = RequestFile::findOrFail($id);
        return view('pages.admin.files.edit', compact('file'));
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
        //
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
