<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Interfaces\HoSoNhanVienInterface;
use App\Models\tbl_hosonhanvien;

class HoSoNhanVienRepository extends BaseRepository implements HoSoNhanVienInterface
{
    public function __construct(tbl_hosonhanvien $model)
    {
        parent::__construct($model);
    }
}