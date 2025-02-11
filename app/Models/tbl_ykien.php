<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_ykien extends Model
{
    protected $table= "tbl_ykien";
    protected $primaryKey = 'id_ykien';

    public function tbl_luuykien(){
        return $this->hasMany('App\tbl_luuykien');
    }
}
