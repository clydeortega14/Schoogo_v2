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
        // $tickets = RequestFile::where(function($query){

        //     if(auth()->user()->role_id == 2){

        //         $query->where('user_id', auth()->user()->id);

        //     }else if(auth()->user()->role_id == 1){
                
        //         $query->where('docs_status_id', 1);
        //     }
        // })->orderBy('created_at', 'desc')->get();

        // $members = User::whereNotIn('id', [auth()->user()->id])->take(8)->get();

        // //members info data
        // $current_request = RequestFile::where('user_id', auth()->user()->id)->latest()->first();

        return view('home');
    }
}
