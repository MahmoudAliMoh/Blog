<?php

namespace App\Contracts\Comments;

interface CommentServiceContract
{
    /**
     * Store comment data.
     *
     * @param $data
     * @param $id
     * @return bool
     */
    public function store($id, $data): bool;

    /**
     * List all comments data assigned to blog;
     *
     * @param $id
     * @return array
     */
    public function list($id): array;
}
