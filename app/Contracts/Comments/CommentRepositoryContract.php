<?php

namespace App\Contracts\Comments;

interface CommentRepositoryContract
{
    /**
     * Store comment data.
     *
     * @param $data
     * @return bool
     */
    public function store($data): bool;

    /**
     * List all comments data assigned to blog;
     *
     * @param $id
     * @return array
     */
    public function list($id): array;
}
