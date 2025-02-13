<?php

namespace App\Repositories\Eloquents;
use App\Models\tbl_hosonhanvien;


use App\Repositories\Interfaces\BHYTInterface;

class BHYTRepository extends BaseRepository implements BHYTInterface
{
    public function __construct(tbl_hosonhanvien $model)
    {
        parent::__construct($model);
    }
}