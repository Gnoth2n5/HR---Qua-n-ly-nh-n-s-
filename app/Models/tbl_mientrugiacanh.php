<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_mientrugiacanh extends Model
{
    protected $table= "tbl_mientrugiacanh";
    protected $primaryKey= 'id_mientrugiacanh';

    public function tbl_hosonhanvien(){
        return $this->belongsTo('App\hosonhanvien');
    }
}
