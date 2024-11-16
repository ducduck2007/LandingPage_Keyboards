<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\DataUser;

class HomeController extends Controller
{
    public function index()
    {
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
