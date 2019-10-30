<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RequestFile;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tickets = RequestFile::orderBy('created_at', 'desc')->get();
        $members = User::whereNotIn('id', [auth()->user()->id])->take(8)->get();

        return view('home', compact('tickets', 'members'));
    }
}
