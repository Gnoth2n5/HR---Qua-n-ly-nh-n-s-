<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\tbl_phongban;
use App\Models\tbl_chucvu;
use App\Models\tbl_hosonhanvien;
use App\Models\tbl_vitri;
use App\Models\tbl_ykien;
use App\Models\tbl_luuykien;
use App\Models\tbl_hopdong;
use App\Models\tbl_phucap;
use App\Models\tbl_loaihopdong;
use App\Models\tbl_chamcong;
use App\Models\tbl_phuluc;
use App\Models\tbl_bangluong;
use App\Models\tbl_chucvu_permission;
use App\Models\tbl_quyetdinhthoiviec;
use Illuminate\Support\Facades\Auth;

class DanhmucController extends Controller
{
/*    protected $ykien;

    public function __construct(){
        $this->$ykien=tbl_ykien::all();
        View::share(['ykien'=> $this->ykien])
    }  
    public function getYKien(){
        $ykien=tbl_ykien::all();
        return $ykien;
    } */

     public function getDanhSachPB(){
    	$phongban=tbl_phongban::all();
    	return view('danhmuc.dspb',['phongban'=>$phongban]);
    }


    public function getDanhSachPC(){
        $phucap=tbl_phucap::all();
        $chucvu=tbl_chucvu::all();
    	return view('danhmuc.dspc',['phucap'=>$phucap,'chucvu'=>$chucvu]);
    }
    

    public function getDanhSachCV(){
    	$chucvu=tbl_chucvu::all();
    	return view('danhmuc.dscv',['chucvu'=>$chucvu]);
    }

    public function getDanhSachNV(){
        // if(Auth::user->tbl_chucvu->tbl_phongban->ten_phong_ban == GD){}
        $nhanvien=tbl_hosonhanvien::orderBy('created_at','desc')->get(); 
        return view('danhmuc.dsnv',['nhanvien'=>$nhanvien]);
    }

    public function getDanhSachNVPB(){
        $nhanvien = tbl_hosonhanvien::where('id_chucvu','like','%'.Auth::user()->tbl_hosonhanvien->tbl_chucvu->id_phongban)->get();
        $tenpb = Auth::user()->tbl_hosonhanvien->tbl_chucvu->tbl_phongban->ten_phong_ban;
        return view('danhmuc.dsnvpb',compact('nhanvien','tenpb'));
    }


    public function getDanhSachHD(){
        $hopdong=tbl_hopdong::all();
        
        return view('danhmuc.dshd',['hopdong'=>$hopdong]);
    }

    public function getDanhSachHDNV($id_nhanvien){
        $nhanvien=tbl_hosonhanvien::where('id_nhanvien',$id_nhanvien)->first();
        $hopdong=tbl_hopdong::where('id_nhanvien',$id_nhanvien)->get();
        foreach($hopdong as $hd){
        
        $phuluc=tbl_phuluc::where('id_hopdong',$hd->id_hopdong)->first();
    }
    
        if(isset($phuluc)){
        return view('danhmuc.dshdnv',['hopdong'=>$hopdong,'nhanvien'=>$nhanvien,'phuluc'=>$phuluc]);
    
        }
        return view('danhmuc.dshdnv',['hopdong'=>$hopdong,'nhanvien'=>$nhanvien]);
    }
    
    public function getDanhSachNVLoai($num){
        $nhanvien=tbl_hosonhanvien::where('tinh_trang','=',$num)->get();
        $quyetdinh=tbl_quyetdinhthoiviec::where('trang_thai','=',2)->get();
        return view('danhmuc.dsnvl',compact('nhanvien','num','quyetdinh'));
    }
   
    public function getHoSoFull($id){
        $nhanvien=tbl_hosonhanvien::where('id_nhanvien','=',$id)->get();
        $hopdong=tbl_hopdong::where('id_nhanvien','=',$id)->get();
        //$chamcong=tbl_chamcong::where('id_nhanvien','=',$id)->get();
        return view('pages.chitiethoso',compact('nhanvien','hopdong'));
    }

    public function getDanhSachYK(){
        if(tbl_chucvu_permission::where('id_chucvu',Auth::user()->tbl_hosonhanvien->tbl_chucvu->id_chucvu)->where('id_permission',23)->exists()){
            $ykien = tbl_luuykien::where('phong_ban_den',Auth::user()->tbl_hosonhanvien->tbl_chucvu->id_phongban)->get();
        }
        else {
            $ykien = tbl_luuykien::all();
        }
        $duyet_1 = tbl_chucvu_permission::where('id_chucvu',Auth::user()->tbl_hosonhanvien->tbl_chucvu->id_chucvu)->where('id_permission',21)->exists();
        $duyet_2 = tbl_chucvu_permission::where('id_chucvu',Auth::user()->tbl_hosonhanvien->tbl_chucvu->id_chucvu)->where('id_permission',22)->exists();
        //dd($duyet_2);
        return view('danhmuc.dsyk',compact('ykien','duyet_1','duyet_2'));
    }
    
    public function getDanhSachYKL($id){
        if(tbl_chucvu_permission::where('id_chucvu',Auth::user()->tbl_hosonhanvien->tbl_chucvu->id_chucvu)->where('id_permission',23)->exists()){
            $ykien = tbl_luuykien::where('id_nhanvien','like','%'.Auth::user()->tbl_hosonhanvien->tbl_chucvu->id_phongban.'%')->get();
        }
        else {
            $ykien = tbl_luuykien::where('id_ykien',$id)->get();
        }
        $duyet_1 = tbl_chucvu_permission::where('id_chucvu',Auth::user()->tbl_hosonhanvien->tbl_chucvu->id_chucvu)->where('id_permission',21)->exists();
        $duyet_2 = tbl_chucvu_permission::where('id_chucvu',Auth::user()->tbl_hosonhanvien->tbl_chucvu->id_chucvu)->where('id_permission',22)->exists();
        $loai = tbl_ykien::find($id);
        return view('danhmuc.dsykl',compact('ykien','loai','duyet_1','duyet_2'));
    }
 


    public function getDanhSachLoaiYK(){
        $loaiykien = tbl_ykien::all();
        return view('danhmuc.dsloaiyk',compact('loaiykien'));
    }

    public function getDanhSachChamCong(){
        $chamcong = tbl_chamcong::orderBy('check_in','desc')->get(); 
        //var_dump($chamcong);exit;
        return view('danhmuc.dschamcong',compact('chamcong'));
 
    }
    public function getDanhSachLuong(){
        $luong=tbl_bangluong::all();
        return view('danhmuc.dsluong',compact('luong'));
    }
    public function getDanhSachThuongAll(){
        $thuong = tbl_luuykien::where('id_ykien',9)
                ->where('trang_thai',2)      
                ->get(); 
        $nhanvien=tbl_hosonhanvien::where('tinh_trang',1)->get();
        return view('danhmuc.dsthuongAll',compact('thuong','nhanvien'));
    }

    public function getDanhSachKyLuatAll(){
        $nhanvien=tbl_hosonhanvien::where('tinh_trang',1)->get();
        $kyluat = tbl_luuykien::where('id_ykien',10)
                ->where('trang_thai',2)
                ->get();
        return view('danhmuc.dskyluatAll',compact('kyluat','nhanvien'));
    }

    public function getDanhSachThuong(){//chua them
        $thuong = tbl_luuykien::where('id_ykien',9)
                ->where('nguoi_huong',Auth::user()->tbl_hosonhanvien->ho_ten)
                ->where('trang_thai',2)
                ->get();
        return view('danhmuc.dsthuong',compact('thuong'));
    }

    public function getDanhSachKyLuat($id_nhanvien){
        $kyluat = tbl_luuykien::where('id_ykien',10)
                ->where('nguoi_huong',$id_nhanvien)
                ->where('trang_thai',2)->orderBy("created_at","desc")
                ->get();

        $nhanvien=tbl_hosonhanvien::where('id_nhanvien',$id_nhanvien)->first();
        return view('quanlynhansu.chitietkyluat',compact('kyluat','nhanvien'));
    }


}
