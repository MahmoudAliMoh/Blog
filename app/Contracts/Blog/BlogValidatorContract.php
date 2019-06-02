<?php

namespace App\Contracts\Blog;

interface BlogValidatorContract
{
    /**
     * Validate categories request
     *
     * @param array $data
     * @return mixed
     */
    public function validations(array $data);
}
