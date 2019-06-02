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
        $category = $this->model->findOrFail($id)->toArray();
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
        $this->model->where('id', $id)->update(['name' => $data['name']]);
        return true;
    }
}
