<?php

namespace App\Repositories\Interfaces;

interface BaseInterface
{
    public function getAll();

    public function find($id);

    public function create(array $attributes);

    public function update($id, array $attributes);

    public function delete($id);
}