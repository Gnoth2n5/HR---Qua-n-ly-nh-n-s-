<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Interfaces\BaseInterface;

class BaseRepository implements BaseInterface
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update($id, array $attributes)
    {
        return $this->model->findOrFail($id)->update($attributes);
    }

    public function delete($id)
    {
        return $this->model->findOrFail($id)->delete();
    }
}