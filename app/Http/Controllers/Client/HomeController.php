<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Sửa lại import DB
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $deal_sale = DB::select("SELECT * FROM deal_sale");
        $image_header = DB::select("SELECT * FROM image_header");

        return view('home', compact('deal_sale', 'image_header'));
    }
}
