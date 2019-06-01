<?php

namespace App\Contracts\Categories;

interface CategoryRepositoryContract
{
    /**
     * Store categories data.
     *
     * @param $data
     * @return bool
     */
    public function store($data): bool;
}
