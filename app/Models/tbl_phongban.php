<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_phongban extends Model
{
    protected $table= 'tbl_phongban';
    protected $primaryKey = 'id_phongban';
    public $incrementing = false;
    //public $timestamps = true;

    public function tbl_chucvu(){
        return $this->hasMany('App\tbl_chucvu','id_phongban','id_phongban');
    }
    public function tbl_hosonhanvien(){
        return $this->hasManyThrough('App\tbl_hosonhanvien','App\tbl_chucvu','id_phongban','id_chucvu','id_nhanvien');
    }
}
