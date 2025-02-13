<?php

namespace App\Repositories\Interfaces;

interface ChamCongInterface
{
    public function getBangLuongThang($idNhanVien, $thang);
    public function createBangLuong($attributes);
    public function getChamCongTheoBangLuong($idBangLuong);
    public function getChamCongHomNay($idBangLuong);
    
    public function getYKienWithNgayBatDau($idNhanVien);
}