<?php

namespace App\Contracts\Comments;

interface CommentValidatorContract
{
    /**
     * Validate comment request
     *
     * @param array $data
     * @return mixed
     */
    public function validations(array $data);
}
