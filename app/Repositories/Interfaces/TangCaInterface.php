<?php

namespace App\Repositories\Interfaces;

interface TangCaInterface
{
    public function getByNhanVienAndDate($idNhanVien, $date);
    public function getById($id);
    public function updateCheckIn($tangca, $checkInTime);
    public function updateCheckoutTime($tangca, $checkoutTime); 
    public function getTangCaHomNay($idNhanVien);

    public function getAllByIdNhanVien($idNhanVien);
}