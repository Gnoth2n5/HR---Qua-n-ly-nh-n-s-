<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_chucvu;
use App\Models\tbl_hosonhanvien;
use App\Models\tbl_phucap;

class AjaxController extends Controller
{


     public function getChucvu($id_phongban){
        // $phongban=tbl_phongban::all();
        $chucvu=tbl_chucvu::where('id_phongban',$id_phongban)->get();
        echo "<option >Chọn chức vụ</option>";
        foreach($chucvu as $cv){
            
            echo "<option value='".$cv->id_chucvu."'>".$cv->ten_chuc_vu."</option>";
        }
        
    }
    public function getChucvumoi($id_phongban_moi){
        $chucvu=tbl_chucvu::where('id_phongban',$id_phongban_moi)->get();
        echo "<option value=''>Chọn chức vụ</option>";
        foreach($chucvu as $cv){
            echo "<option value='".$cv->id_chucvu."'>".$cv->ten_chuc_vu."</option>";
        }
        
    }
    public function getNhanvienykien($id_chucvu){
        $nhanvien=tbl_hosonhanvien::where('id_chucvu',$id_chucvu)->where('tinh_trang',1)->get();
        echo "<option value=''>Chọn nhân viên</option>";
        foreach($nhanvien as $nv){
            echo "<option value='".$nv->id_nhanvien."'>".$nv->ho_ten."</option>";
        }
    }
    public function getPhucapmoi($id_chucvu_moi){
        $phucap=tbl_phucap::where('id_chucvu',$id_chucvu_moi)->first();

        echo"<p class=' ml-4 mb-4'>Ăn trưa: ".$phucap->an_trua."</p>";
        echo"<p class=' ml-4 mb-4'>Xăng xe: ".$phucap->xang_xe."</p>";
        echo"<p class=' ml-4 mb-4'>Khác: ".$phucap->khac."</p>";
        echo"<div class='gach' style='background-color: red;width: 150px;height: 2px;'></div>";
        echo"<p class='ml-3 mt-4'>Tổng tiền: ".$phucap->tong_tien_phu_cap."</p>";
        // foreach($chucvu as $cv){
        //     echo "<option value='".$cv->id_chucvu."'>".$cv->ten_chuc_vu."</option>";
        // }
        
    }
    

}
