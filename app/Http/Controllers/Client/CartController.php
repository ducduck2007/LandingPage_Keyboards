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
        
        // Lấy lại giỏ hàng của người dùng, tính tổng số lượng cho sản phẩm trùng tên
        $giohang = DB::select("
            SELECT name_product, COUNT(name_product) as quantity, id, image, price
            FROM carts
            WHERE `name` = :name
            GROUP BY name_product
        ", ['name' => $name]);
        
        return response()->json($giohang);
    }

    public function checkout(Request $request)
    {
        // Lấy dữ liệu sản phẩm từ request
        $spham_id = $request->input('id');
        $name_product = $request->input('name_product');
        $price = $request->input('price');
        $image = $request->input('image');
        $quantity = $request->input('quantity');  // Số lượng đến từ input của input modal
        $name = Auth::user()->name;
        
        // Lấy tất cả các sản phẩm có name_product trùng trong bảng carts
        $cartItems = DB::table('carts')->where('name', $name)->where('name_product', $name_product)->get();
        
        // Kiểm tra nếu có sản phẩm trong giỏ hàng
        if ($cartItems->isNotEmpty()) {
            // Lặp qua các sản phẩm trong giỏ hàng để insert vào bảng history_product
            foreach ($cartItems as $cartItem) {
                DB::table('history_product')->insert([
                    'id' => $cartItem->id,
                    'name_product' => $cartItem->name_product,
                    'price' => $cartItem->price,
                    'quantity' => $quantity,  // Sử dụng số lượng từ biến trên
                    'image' => $cartItem->image,
                    'name' => $cartItem->name,
                    'status' => 1, // 1 - thành công
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
            
            // Xóa tất cả các sản phẩm có name_product trùng trong giỏ hàng
            $deleted = DB::table('carts')->where('name', $name)->where('name_product', $name_product)->delete();
            
            // Kiểm tra nếu việc xóa thành công
            if ($deleted) {
                return response()->json(['success' => true, 'message' => 'Items successfully removed from the cart and added to history.']);
            } else {
                return response()->json(['success' => false, 'message' => 'Error deleting items from cart.']);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Item not found in cart.']);
        }
    }

    public function history()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để tra cứu đơn hàng.');
        }
    
        $name = Auth::user()->name;
        $data = DB::select("SELECT * FROM history_product WHERE `name` = ?", [$name]);
    
        // Truyền biến $data vào view
        return view('admin.sub.home', compact('data'));
    }
    
}
