<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_hopdong extends Model
{
    protected $table= "tbl_hopdong";
    protected $primaryKey= 'id_hopdong';
    public $incrementing = false;
    public function tbl_hosonhanvien(){
        return $this->belongsTo('App\tbl_hosonhanvien','id_nhanvien','id_nhanvien');
    }
    public function tbl_loaihopdong(){
        return $this->belongsTo('App\tbl_loaihopdong','id_loaihopdong','id_loaihopdong');
    }
    public function tbl_phucap(){
        return $this->hasOne('App\tbl_phucap','id','id_phucap');
    }
}
