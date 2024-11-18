<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['index2']);
    }

    public function index()
    {
        // if (Auth::check()) {
        //     // Người dùng đã đăng nhập, chuyển hướng tới trang client.home
        //     return redirect()->route('client.home');
        // }

        $deal_sale = DB::select("SELECT * FROM deal_sale");
        $header = DB::select("SELECT * FROM header");
        $image_header = DB::select("SELECT * FROM image_header");
        $best_selling = DB::select("SELECT * FROM best_selling");
        $featured_photo = DB::select("SELECT * FROM featured_photo");
        $products = DB::select("SELECT * FROM products");
        $contact = DB::select("SELECT * FROM contact");

        return view('client.home2', compact('deal_sale', 'header', 'image_header', 'best_selling', 'featured_photo', 'products', 'contact'));
    }

    public function index2()
    {
        if (!Auth::check()) {
            return redirect()->route('client.login');
        }

        $deal_sale = DB::select("SELECT * FROM deal_sale");
        $header = DB::select("SELECT * FROM header");
        $image_header = DB::select("SELECT * FROM image_header");
        $best_selling = DB::select("SELECT * FROM best_selling");
        $featured_photo = DB::select("SELECT * FROM featured_photo");
        $products = DB::select("SELECT * FROM products");
        $contact = DB::select("SELECT * FROM contact");

        return view('client.home', compact('deal_sale', 'header', 'image_header', 'best_selling', 'featured_photo', 'products', 'contact'));
    }
}

