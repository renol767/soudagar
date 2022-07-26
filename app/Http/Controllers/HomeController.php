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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->role == "website"){
            return redirect('/website');
        }else if (auth()->user()->role == "gudang"){
            return redirect('/gudang');
        }else{
            return redirect('/reseller');
        }
    }
}
