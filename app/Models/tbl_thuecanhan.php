<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_thuecanhan extends Model
{
    protected $table= "tbl_thuecanhan";
    public function tbl_mientrugiacanh(){
        return $this->belongsTo('App\tbl_mientrugiacanh','id_mientrugiacanh','id_thuecanhan');
    }
}
