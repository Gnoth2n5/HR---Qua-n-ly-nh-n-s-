<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;


class UserController extends Controller
{
    function __construct(){
        
        if(Auth::check()){
            view()->share('nhanvien',Auth::user());
        }
    }
    public function getDangnhap(){
    	return view('login');
    }
    public function postDangnhap(Request $request){
        if(Auth::attempt(['user_name'=>$request->user_name,'password'=>$request->password])){
            return redirect('/');
        }
        else{
            return redirect('login')->with('thongbao','Tài khoảng hoặc mật khẩu không đúng, vui lòng đăng nhập lại');
        }
    }
}
