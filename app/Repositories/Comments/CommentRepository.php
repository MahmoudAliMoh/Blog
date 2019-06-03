<?php

namespace App\Repositories\Comments;


use App\Contracts\COmments\CommentRepositoryContract;
use App\Models\Comment;

class CommentRepository implements CommentRepositoryContract
{

    /*
     * Model instance;
     */
    protected $model;

    public function __construct(Comment $model)
    {
        $this->model = $model;
    }

    /**
     * Store comment data in database.
     *
     * @param $data
     * @return bool
     */
    public function store($data): bool
    {
        $this->model->create($data);
        return true;
    }

    /**
     * List all comments data assigned to blog;
     *
     * @var $id
     * @return array
     */
    public function list($id): array
    {
        return $this->model->orderBy('id', 'DESC')
            ->where('blog_id', $id)
            ->get()->toArray();
    }
}
