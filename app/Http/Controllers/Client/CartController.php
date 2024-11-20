<?php

namespace App\Http\Controllers\Client; // Namespace đúng cho Client

use App\Http\Controllers\Controller; // Import Controller
use Illuminate\Http\Request; // Import Request
use Illuminate\Support\Facades\DB; // Import DB
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {

        $name = Auth::user()->name;
        // Lưu thông tin vào database
        DB::table('carts')->insert([
            'name_product' => $request->name,
            'image' => $request->image,
            'price' => $request->price,
            'created_at' => now(),
            'updated_at' => now(),
            'name' => $name,
        ]);
    
        // Trả về phản hồi JSON
        return response()->json(['message' => 'Thêm vào giỏ hàng thành công!'], 200);
    }

    public function updateCart()
    {
        if (!Auth::check()) {
            return response()->json([], 401); // Nếu người dùng chưa đăng nhập, trả về lỗi
        }
        
        $name = Auth::user()->name;
        
        // Lấy lại giỏ hàng của người dùng
        $giohang = DB::table('carts')
                    ->select('name', 'name_product', DB::raw('COUNT(name_product) as quantity'), 'image')
                    ->where('name', $name)
                    ->groupBy('name', 'name_product', 'image')
                    ->get();
    
        return response()->json($giohang);
    }
}
