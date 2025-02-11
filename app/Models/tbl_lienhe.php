<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_lienhe extends Model
{
    protected $table= "tbl_lienhe";
    protected $primaryKey= 'id_lienhe';
    public $incrementing = false;
    
    public function tbl_hosonhanvien(){
        return $this->belongsTo('App\tbl_hosonhanvien','id_nhanvien','id_nhanvien');
    }
    
    public function tbl_tinh(){
        return $this->belongsTo('App\tbl_tinh','id_tinh','id_tinh');
}
}
