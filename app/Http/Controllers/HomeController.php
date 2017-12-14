<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Public_message;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pub_messages = Public_message::all();
        return view('home',compact('pub_messages'));
    }
}
