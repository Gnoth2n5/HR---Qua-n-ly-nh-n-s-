<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_giadinh extends Model
{
    protected $table= "tbl_giadinh";
    protected $primaryKey= 'id_giadinh';
    public $incrementing = false;
    public function tbl_hosonhanvien(){
        return $this->belongsTo('App\tbl_hosonhanvien','id_nhanvien','id_nhanvien');
    }
}
