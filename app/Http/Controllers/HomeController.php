<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // We don't need authentication to see the landing page.
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function locations()
    {
        return view('locations');
    }

    public function upload()
    {
        return view('upload');
    }

    public function about()
    {
        return view('about');
    }

    public function help()
    {
        return view('help');
    }
}
