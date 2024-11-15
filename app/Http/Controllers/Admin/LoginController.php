<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User; // Đảm bảo namespace này đúng
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Admin\ListFunctionAPIController;

class LoginController extends Controller
{
    public function index()
    {
         return view('admin.login');
    }
   
    public function postLogin(Request $req)
    {
        $this->validate($req,
            [
                'name' => 'required',   // Sửa từ 'username' thành 'name'
                'password' => 'required'
            ],
            [
                'name.required' => 'Tên đăng nhập không được để trống!',
                'password.required' => 'Mật khẩu không được để trống!',
            ]
        );

        // Thay 'username' thành 'name' và thêm điều kiện 'role' => 'admin'
        $login = [
            'name' => $req->name,
            'password' => $req->password,
            'role' => 'admin',  // Chỉ cho phép đăng nhập nếu role là admin
            'status' => 1       // Kiểm tra trạng thái (nếu có)
        ];

        if(Auth::attempt($login)){
            try {
                return redirect()->route('admin.home');
            } catch (\Exception $e) {
                return Redirect::back()->withErrors('Lỗi server');
            }
        } else {
            return Redirect::back()->withErrors('Sai tài khoản hoặc mật khẩu!');
        }
    }

    public function logOut()
    {
        Auth::logout();
        return redirect()->route('homeLogin');
    }

    public function UpdatePass(Request $request) 
    {
        $this->validate($request, [
            'passOld'=> 'required',
            'passNew'=> 'required|min:8|max:20|regex:/^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[#?!@$%^&*-]).{8,20}$/',
            'repassNew'=> 'required|same:passNew',
            ], 
            [
            'passOld.required' => 'Vui lòng nhập mật khẩu cũ',
            'passNew.required' => 'Vui lòng nhập mật khẩu mới',
            'repassNew.required' => 'Vui lòng nhập lại mật khẩu mới',
            'repassNew.same' => 'Mật khẩu mới không trùng khớp',
            'passNew.regex' => 'Mật khẩu mới phải gồm chữ hoa, chữ thường và ký tự đặc biệt (!@#$%^&+=)',
            'passNew.min' => 'Mật khẩu mới phải lớn hơn 8 ký tự',
            'passNew.max' => 'Mật khẩu mới phải nhỏ hơn 20 ký tự',
        ]);

        $model = User::find(Auth::user()->id);
        $Info = new ListFunctionAPIController();
        $data = $Info->changePassword($request->passOld, $request->passNew);
        
        if ($data->final_status == 200) {
            return Redirect::back()->withErrors($data->vi_message); 
        } else {
            return Redirect::back()->withErrors($data->vi_message);
        }
    }

    public function ViewChangePass()
    {
        return view('admin.view-change-pass');
    }
}
