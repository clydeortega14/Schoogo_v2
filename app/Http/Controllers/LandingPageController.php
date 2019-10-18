<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaperSize;
use App\PrintType;
use App\RequestFile;

class LandingPageController extends Controller
{
    public function index()
    {
    	$sizes = PaperSize::all();
    	$types = PrintType::all();

    	return view('welcome', compact('sizes', 'types'));
    }

    public function view($id)
    {
    	$req_file = RequestFile::findOrFail($id);
    	return view('view-file', compact('req_file'));
    }
}
