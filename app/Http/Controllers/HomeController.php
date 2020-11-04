<?php

namespace App\Http\Controllers;

use PDF;
use App\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     
    public function __construct()
    {
        $this->middleware('auth');
    }
    */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function pdf()
    {
        $items = Item::get();

        $pdf = \PDF::loadView('PDF-VIEW', compact('items'));
        return $pdf->stream();
    }
}
