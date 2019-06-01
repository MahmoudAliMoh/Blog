<?php

namespace App\Contracts\Categories;

interface CategoryValidatorContract
{
    /**
     * Validate categories request
     *
     * @param array $data
     * @return mixed
     */
    public function validations(array $data);
}
