<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
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

        return view('client.home', compact('deal_sale', 'header', 'image_header', 'best_selling', 'featured_photo'));
    }    

    // Phương thức xử lý đăng ký
    public function register(Request $request)
    {
        // Kiểm tra dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|unique:data_users,user_name',
            'email' => 'required|email|unique:data_users,email',
            'password' => 'required|min:6',
        ]);

        // Nếu có lỗi, trả về lỗi
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => 'Tên đăng nhập hoặc email đã tồn tại'], 400);
        }

        // Thêm người dùng vào DB
        DataUser::create([
            'user_name' => $request->user_name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Mã hóa mật khẩu
        ]);

        return response()->json(['success' => true, 'message' => 'Chuyển đến phần đăng nhập']);
    }

    // Phương thức xử lý đăng nhập
    public function login(Request $request)
    {
        $user = DataUser::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Email hoặc mật khẩu không chính xác'], 401);
    }
}
