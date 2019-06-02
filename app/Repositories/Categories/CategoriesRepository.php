<?php

namespace App\Repositories\Categories;


use App\Contracts\Categories\CategoryRepositoryContract;
use App\Models\Category;

class CategoriesRepository implements CategoryRepositoryContract
{

    /*
     * Model instance;
     */
    protected $model;

    public function __construct(Category $model)
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
        return $this->model->orderBy('id', 'DESC')->get()->toArray();
    }
}
