<?php

namespace App\Repositories\Blog;


use App\Contracts\Blog\BlogRepositoryContract;
use App\Models\Blog;

class BlogRepository implements BlogRepositoryContract
{

    /*
     * Model instance;
     */
    protected $model;

    public function __construct(Blog $model)
    {
        $this->model = $model;
    }

    /**
     * Store categories data in data base.
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
     * List all categories data;
     *
     * @return array
     */
    public function list(): array
    {
        return $this->model->orderBy('id', 'DESC')->with('category', 'comment')->get()->toArray();
    }


    /**
     * Destroy category by id in storage.
     *
     * @param int $id
     * @return bool
     * @throws \Exception
     */
    public function destroy(int $id): bool
    {
        $this->model->where('id', $id)->delete();
        return true;
    }

    /**
     * Show category data by id.
     *
     * @param int $id
     * @return array
     */
    public function show(int $id): array
    {
        $category = $this->model->with('category', 'comment', 'comment.user')->findOrFail($id)->toArray();
        return $category;
    }

    /**
     * Update category data by id.
     *
     * @param array $data
     * @param int $id
     * @return bool
     */
    public function update(int $id, array $data): bool
    {
        $this->model->where('id', $id)->update([
            'title' => $data['title'],
            'content' => $data['content'],
            'cover' => $data['cover'],
            'category_id' => $data['category_id'],
        ]);
        return true;
    }
}
