<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_chamcong extends Model
{
    protected $table= "tbl_chamcong";
    protected $primaryKey = 'id_chamcong';
    public $timestamps = false;
    
    public function tbl_bangluong(){
    	return $this->belongsTo('App\tbl_bangluong','id_bangluong','id_bangluong');
    }

    public function tbl_tangca(){
    	return $this->belongsTo('App\tbl_tangca','id_tangca','id_chamcong');
    }

}
