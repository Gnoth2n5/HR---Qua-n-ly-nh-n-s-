<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_phuluc extends Model
{
    protected $table= "tbl_phuluc";
    // protected $primaryKey = 'id_phuluc';
    public function tbl_hopdong(){
        return $this->belongsTo('App\tbl_hopdong','id_hopdong','id_hopdong');
    }
    // public function tbl_loaiphuluc(){
    //     return $this->belongsTo('App\tbl_loaiphuluc','id','id_loaiphuluc');
    // }
    public function tbl_loaiphuluc(){
        return $this->belongsTo('App\tbl_loaiphuluc','id_loaiphuluc','id');
    }
    public function tbl_chitietphuluc(){
        return $this->belongsTo('App\tbl_chitietphuluc','id_chitiet','id');
    }
}
