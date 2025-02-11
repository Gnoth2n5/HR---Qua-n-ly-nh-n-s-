<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_khenthuong extends Model
{
    protected $table= "tbl_khenthuong";
    public function tbl_hosonhanvien(){
        return $this->belongsTo('App\tbl_hosonhanvien','id_nhanvien','id_khenthuong');
    }
}
