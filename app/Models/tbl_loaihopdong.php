<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_loaihopdong extends Model
{
    protected $table= "tbl_loaihopdong";
    protected $primaryKey = 'id_loaihopdong';

    // public function tbl_hopdong(){
    //     return $this->belongsTo('App\tbl_hopdong','id_loaihopdong','id_loaihopdong');
    // }
    
}
