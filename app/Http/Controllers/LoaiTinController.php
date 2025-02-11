<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiTin;
use App\Models\TheLoai;

class LoaiTinController extends Controller
{
    public function getDanhSach(){
    	$loaitin=LoaiTin::all();
    	return view('quanlytintuc.danhsachloaitin',['loaitin'=>$loaitin]);
    }
    public function getThem(){
        $theloai=TheLoai::all();
    	return view('quanlytintuc.themloaitin',['theloai'=>$theloai]);

    }
    public function postThem(Request $request){
    	$this->validate($request,
            ['Ten'=>'required|min:3|max:100','Ten'=>'required|unique:LoaiTin',
            'TheLoai'=>'required'
            ],
            ['Ten.required'=>'Bạn chưa nhập tên loại tin!!',
                'Ten.min'=>'Tên loại tin quá ngắn',
                'Ten.max'=>'Tên loại tin quá dài',
                'Ten.unique'=>'Tên loại tin đã tồn tại.',
                'TheLoai.unique'=>'Bạn chưa chọn thể loại.'
            ]);
        $loaitin= new LoaiTin;
        $loaitin->Ten=$request->Ten;
        $loaitin->TenKhongDau=changeTitle($request->Ten);
        $loaitin->idTheLoai=$request->TheLoai;
        $loaitin->save();
        return redirect('private/loaitin/danhsach')->with('thongbao','Thêm thành công');
    }


    public function getSua($id){
    	$loaitin=LoaiTin::find($id);
        $theloai=TheLoai::all();
         return view('quanlytintuc.sualoaitin',['loaitin'=>$loaitin,'theloai'=>$theloai]);
    }
    public function postSua(Request $request,$id){
    	$loaitin=LoaiTin::find($id);
      $this->validate($request,
            ['Ten'=>'required|min:3|max:100','Ten'=>'required|unique:LoaiTin',
            'TheLoai'=>'required'
            ],
            ['Ten.required'=>'Bạn chưa nhập tên loại tin!!',
                'Ten.min'=>'Tên loại tin quá ngắn',
                'Ten.max'=>'Tên loại tin quá dài',
                'Ten.unique'=>'Tên loại tin đã tồn tại.',
                'TheLoai.unique'=>'Bạn chưa chọn thể loại.'
            ]);
        $loaitin->Ten=$request->Ten;
        $loaitin->TenKhongDau=changeTitle($request->Ten);
        $loaitin->idTheLoai=$request->TheLoai;
        $loaitin->save();
        return redirect('private/loaitin/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id){
    	$loaitin=LoaiTin::find($id);
        $loaitin->delete();
        return redirect('private/loaitin/danhsach')->with('thongbao','Xóa thành công');
    }
}
