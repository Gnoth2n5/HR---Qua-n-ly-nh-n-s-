<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Interfaces\ChamCongInterface;
use App\Models\tbl_bangluong;
use App\Models\tbl_chamcong;
use App\Models\tbl_tangca;
use App\Models\tbl_luuykien;

class ChamCongRepository implements ChamCongInterface
{
    public function getBangLuongThang($idNhanVien, $thang)
    {
        return tbl_bangluong::where('id_nhanvien', $idNhanVien)
            ->whereMonth('luong_thang', $thang)
            ->first();
    }

    public function createBangLuong($attributes)
    {
        return tbl_bangluong::create($attributes);
    }

    public function getChamCongTheoBangLuong($idBangLuong)
    {
        return tbl_chamcong::where('id_bangluong', $idBangLuong)->get();
    }

    public function getChamCongHomNay($idBangLuong)
    {
        return tbl_chamcong::where('id_bangluong', $idBangLuong)
            ->where('check_in', 'like', date('Y-m-d') . '%')
            ->first();
    }


    public function getYKienWithNgayBatDau($idNhanVien)
    {
        return tbl_luuykien::where('id_nhanvien', $idNhanVien)
            ->where('ngay_bat_dau', date('Y-m-d'))
            ->first();
    }
}