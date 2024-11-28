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
        
        $name = Auth::user()->name; // Lấy tên người dùng
        
        $giohang = DB::table('carts')
                    ->select('name_product', DB::raw('COUNT(name_product) as quantity'), 'image')
                    ->where('name', $name)
                    ->groupBy('name_product', 'image')
                    ->get();
    
        $deal_sale = DB::select("SELECT * FROM deal_sale");
        $header = DB::select("SELECT * FROM header");
        $image_header = DB::select("SELECT * FROM image_header");
        $best_selling = DB::select("SELECT * FROM best_selling");
        $featured_photo = DB::select("SELECT * FROM featured_photo");
        $products = DB::select("SELECT * FROM products");
        $contact = DB::select("SELECT * FROM contact");

        $history_product = DB::select("
        SELECT 
            *, 
            SUM(REPLACE(REPLACE(price, '.', ''), '₫', '') * quantity) AS ThanhTien
        FROM history_product
        WHERE `name` = ?
        GROUP BY DATE_FORMAT(created_at, '%Y-%m-%d %H:%i:%s'), name_product;
        ", [$name]);

        // $slGioHang = DB::table('carts')->count('name_product');
    
        return view('client.home', compact('deal_sale', 'header', 'image_header', 'best_selling', 'featured_photo', 'products', 'contact', 'giohang', 'name', 'history_product'));
    }

    public function getCartCount()
    {
        if (Auth::check()) {
            $name = Auth::user()->name;
            $count = DB::table('carts')->where('name', $name)->count('name_product');
            return response()->json(['count' => $count]);
        }
        return response()->json(['count' => 0]);
    }    
    
}

