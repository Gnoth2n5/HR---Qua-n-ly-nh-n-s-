<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_chitietphuluc extends Model
{
    protected $table= "tbl_chitietphuluc";

    // public function tbl_luuykien(){
    //     return $this->hasMany('App\tbl_luuykien');
    // }
    public function tbl_chucvu(){
        return $this->hasOne('App\tbl_chucvu','id_chucvu','id_chucvu_moi');
    }
    public function tbl_phucap(){
        return $this->hasOne('App\tbl_phucap','id','id_phucap_moi');
    }
    // public function tbl_loaihopdong(){
    //     return $this->belongsTo('App\tbl_loaihopdong','id_loaihopdong','id_loaihopdong_moi');
    // }
    public function tbl_loaihopdong(){
        return $this->hasOne('App\tbl_loaihopdong','id_loaihopdong','id_loaihopdong_moi');
    }
}
