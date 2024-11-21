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
                    ->select('*', DB::raw('COUNT(name_product) as quantity'))
                    ->where('name', $name)
                    ->get();
    
        return response()->json($giohang);
    }

    public function checkout(Request $request)
    {
        // Lấy dữ liệu từ request
        $name = $request->input('name');
        $image = $request->input('image');
        $price = $request->input('price');
        $quantity = $request->input('quantity'); // Giá trị mới từ ô input
    
        DB::delete('DELETE FROM carts WHERE name = ?', [$name]);
    
        // Kiểm tra nếu tồn tại dữ liệu trong carts
        // if ($cartItem) {
        //     // Xóa dữ liệu từ bảng carts
        //     DB::table('carts')
        //     ->where('name', $cartItem->name) // Sử dụng id để đảm bảo xóa đúng bản ghi
        //     ->delete();        
    
        //     // Thêm dữ liệu vào bảng history
        //     DB::table('history')->insert([
        //         'name' => $name,
        //         'image' => $image,
        //         'price' => $price,
        //         'quantity' => $quantity, // Giá trị từ ô input
        //         'status' => 1, // Gán kiểu dữ liệu = 1
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ]);
    
        //     // Trả về phản hồi thành công
        //     return response()->json(['success' => true, 'message' => 'Checkout completed.']);
        // }
    
        // Trả về phản hồi nếu không tìm thấy dữ liệu
        return response()->json(['success' => false, 'message' => 'Item not found in cart.']);
    }
    
}
