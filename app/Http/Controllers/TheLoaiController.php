<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;

class TheLoaiController extends Controller
{
    public function getDanhSach(){
    	$theloai=TheLoai::all();
    	return view('quanlytintuc.danhsachtheloai',['theloai'=>$theloai]);
    }
    public function getThem(){
    	return view('quanlytintuc.themtheloai');
    }
    public function postThem(Request $request){
    	$this->validate($request,
    		[
    			'Ten'=>'required|min:3|max:100','Ten'=>'required|unique:TheLoai'
    		],
    		[
    			'Ten.required'=>'Bạn chưa nhập tên thể loại!!',
    			'Ten.min'=>'Tên thể loại quá ngắn',
    			'Ten.max'=>'Tên thể loại quá dài',
    			'Ten.unique'=>'Tên thể loại đã tồn tại.'
    		]);
    	$theloai=new TheLoai;
    	$theloai->Ten=$request->Ten;
    	$theloai->Ten=$request->Ten;
    	$theloai->TenKhongDau=changeTitle($request->Ten);
    	$theloai->save();
    	return redirect('private/theloai/danhsach')->with('thongbao','Thêm thành công');
    }


    public function getSua($id){
    	 $theloai=TheLoai::find($id);
    	 return view('quanlytintuc.suatheloai',['theloai'=>$theloai]);
    }
    public function postSua(Request $request,$id){
    	$theloai=TheLoai::find($id);
    	$this->validate($request,
    		['Ten'=>'required|unique:TheLoai,Ten|min:3|max:100'],
    		['Ten.required'=>'Bạn chưa nhập tên thể loại!!',
    		'Ten.unique'=>'Tên thể loại đã tồn tại.',
    		'Ten.min'=>'Tên thể loại quá ngắn',
    		'Ten.max'=>'Tên thể loại quá dài'
    		]
    	);
    	$theloai->Ten=$request->Ten;
    	$theloai->TenKhongDau=changeTitle($request->Ten);
    	$theloai->save();
    	return redirect('private/theloai/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id){
        // $user=User::find($id);
        // $comment = Comment::where('idUser',$id);
        // $comment->delete();
        // $user->delete();
    	$theloai=TheLoai::find($id);
        $loaitin=LoaiTin::where('idTheLoai',$id);
        $loaitin->delete();
    	$theloai->delete();
    	return redirect('private/theloai/danhsach')->with('thongbao','Xóa thành công');
    }
}
