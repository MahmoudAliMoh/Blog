<?php

namespace App\Contracts\Categories;

interface CategoryServiceContract
{
    /**
     * Store categories data.
     *
     * @param $data
     * @return array
     */
    public function store($data): array;
}
