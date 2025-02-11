<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_luuykien extends Model
{
    protected $table= "tbl_luuykien";
    protected $primaryKey = 'id_luuykien';
    public function tbl_ykien(){
        return $this->belongsTo('App\tbl_ykien','id_ykien','id_ykien');
    }
    public function tbl_hosonhanvien(){
        return $this->belongsTo('App\tbl_hosonhanvien','id_nhanvien','id_nhanvien');
    }
}
