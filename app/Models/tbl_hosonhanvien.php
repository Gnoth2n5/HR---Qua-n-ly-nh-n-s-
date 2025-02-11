<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_hosonhanvien extends Model
{
    protected $table= "tbl_hosonhanvien";
    protected $primaryKey= 'id_nhanvien';
    public $incrementing = false;

    public function tbl_chucvu(){
        return $this->hasOne('App\tbl_chucvu','id_chucvu','id_chucvu');
    }
    
    public function tbl_phongban(){
        return $this->hasManyThrough('App\tbl_phongban','App\tbl_chucvu','id_nhanvien','id_chucvu','id_phongban');
    }
    
    public function tbl_vitri(){
        return $this->belongsTo('App\tbl_vitri','id_vitri','id_vitri');
    }

    public function tbl_hopdong(){
        return $this->hasOne('App\tbl_hopdong','id_hopdong','id_hopdong');
    }
        
    public function tbl_dantoc(){
        return $this->belongsTo('App\tbl_dantoc','id_dantoc','id_dantoc');
    }
        
    public function tbl_chamcong(){
        return $this->hasMany('App\tbl_chamcong','id_nhanvien','id_nhanvien');
    }
    
    public function tbl_bangluong(){
        return $this->hasMany('App\tbl_bangluong');
    }

    public function tbl_mientrugiacanh(){
        return $this->hasOne('App\tbl_mientrugiacanh');
    }
    
    public function tbl_baohiem(){
        return $this->belongsTo('App\tbl_baohiem','id_baohiem','id_baohiem  ');
    }
}
