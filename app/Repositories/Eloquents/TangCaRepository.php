<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Interfaces\TangCaInterface;
use App\Models\tbl_tangca;

class TangCaRepository implements TangCaInterface
{
    public function getByNhanVienAndDate($idNhanVien, $date)
    {
        return tbl_tangca::where('id_nhanvien', $idNhanVien)
                ->where('check_in', $date)
                ->orderBy('id_tangca', 'DESC')
                ->first();
    }

    public function getTangCaHomNay($idNhanVien)
    {
        return tbl_tangca::where('id_nhanvien', $idNhanVien)
            ->where('check_in', 'like', date('Y-m-d') . '%')
            ->first();
    }

    public function getById($id)
    {
        return tbl_tangca::findOrFail($id);
    }

    public function updateCheckIn($tangca, $checkInTime)
    {
        $tangca->check_in = $checkInTime;
        $tangca->save();
    }

    public function updateCheckoutTime($tangca, $checkoutTime)
    {
        $tangca->thoi_gian_lam = (strtotime($checkoutTime) - strtotime($tangca->check_in)) / 3600;
        $tangca->save();
    }

    public function getAllByIdNhanVien($idNhanVien)
    {
        return tbl_tangca::where('id_nhanvien', $idNhanVien)->get();
    }
}