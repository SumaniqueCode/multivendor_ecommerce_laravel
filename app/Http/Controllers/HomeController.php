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
        if (auth()->user()->role == 'User') {
            return redirect()->route( 'user_dashboard' );
        }
        if (auth()->user()->role == 'Seller') {
            return redirect()->route( 'seller_dashboard' );
        }
        return view('welcome');
    }
}
