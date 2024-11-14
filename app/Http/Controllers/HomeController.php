<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
        $deal_sale = DB::select("SELECT * FROM deal_sale");
        $header = DB::select("SELECT * FROM header");
        $image_header = DB::select("SELECT * FROM image_header");
        $best_selling = DB::select("SELECT * FROM best_selling");
        $featured_photo = DB::select("SELECT * FROM featured_photo");

        return view('home', compact('deal_sale', 'header', 'image_header', 'best_selling', 'featured_photo'));
    }
}
