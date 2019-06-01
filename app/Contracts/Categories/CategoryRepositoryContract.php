<?php

namespace App\Contracts\Categories;

interface CategoryRepositoryContract
{
    /**
     * Store categories data.
     *
     * @param $data
     * @return array
     */
    public function store($data): array;
}
