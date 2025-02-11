<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_tintuyendung extends Model
{
    protected $table = "tbl_tintuyendung";
    public function tbl_chucvu()
    {
        return $this->hasOne(tbl_chucvu::class, 'id_chucvu', 'vi_tri');
    }
}
