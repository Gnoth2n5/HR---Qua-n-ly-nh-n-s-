<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_kyluat extends Model
{
    protected $table= "tbl_kyluat";
    public function tbl_hosonhanvien(){
        return $this->belongsTo('App\tbl_hosonhanvien','id_nhanvien','id_kyluat');
    }
}
