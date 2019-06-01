<?php

namespace App\Contracts\Categories;

interface CategoryServiceContract
{
    /**
     * Store categories data.
     *
     * @param $data
     * @return bool
     */
    public function store($data): bool;
}
