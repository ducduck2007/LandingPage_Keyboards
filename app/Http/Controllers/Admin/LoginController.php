<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Admin\ListFunctionAPIController;


class LoginController extends Controller
{
    public function index()
    {
         # code...
         return view('admin.login');
    }
   
    public function postLogin(Request $req)
    {
    
        # code...
        $this->validate($req,
            [
                'username' => 'required',
                'password' => 'required'
            ],
            [
                'username.required' => 'User cannot be empty !',
                'password.required' => 'password cannot be empty !',
                
            ]

        );
        $login = [
            'username' => $req->username,
            'password' => $req->password,
            'status' =>1
        ];
        if(Auth::attempt($login)){
            try{
                return redirect()->route('admin.home');
            }catch (\Exception $e) {
                return Redirect::back()->withErrors('Lỗi server');
            }
         
        }else{
            // dd(1);
            return Redirect::back()->withErrors('Sai tài khoản hoặc mật khẩu !');
            
        }
     
    }

    public function logOut()
    {
        # code...
        Auth::logout();
        return redirect()->route('homeLogin');
    }
    public function UpdatePass(Request $request) {
      
            // dd($request);
        $this->validate($request, [
            'passOld'=> 'required',
            'passNew'=> 'required|required|min:8|max:20|regex:/^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[#?!@$%^&*-]).{8,20}$/',
            'repassNew'=> 'required|same:passNew',
            ], 
            [
            'passOld.required' => 'Vui lòng nhập mật khẩu',
            'passNew.required' => 'Vui lòng nhập mật khẩu',
            'repassNew.required' => 'Vui lòng nhập mật khẩu',
            'repassNew.same' => 'Mật khẩu không trùng khớp',
            'passNew.regex' => 'Mật khẩu mới dài ít nhất 8 ký tự, phải bao gồm chữ hoa, chữ thường và ký tự đăc biệt (!@#$%^&+=)',
            'passNew.min' => 'Mật khẩu mới lớn hơn 8 ký tự',
            'passNew.max' => 'Mật khẩu mới nhỏ hơn 20 ký tự',
        ]);
        $model = User::find(Auth::user()->id);
        $Info=new ListFunctionAPIController();
            // dd(1);
        $data=$Info->changePassword($request->passOld,$request->passNew);
        
        if($data->final_status==200){
            return Redirect::back()->withErrors($data->vi_message); 
         }else{

            return Redirect::back()->withErrors($data->vi_message);
            
        }
    }
    public function ViewChangePass()
    {
        return view('admin.view-change-pass');
    }
}
