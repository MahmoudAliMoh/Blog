<?php

namespace App\Services\Blog;

use App\Contracts\Blog\BlogRepositoryContract;
use App\Contracts\Blog\BlogServiceContract;
use App\Contracts\Blog\BlogValidatorContract;
use App\Transformers\BlogTransformer;
use App\Transformers\CategoriesTransformer;
use App\Utilities\Services\UploadFiles;
use Illuminate\Support\Facades\DB;
use Spatie\Fractal\FractalFacade;

class BlogService implements BlogServiceContract
{
    /*
     * Upload files trait.
     */
    use UploadFiles;

    /*
     * repository instance from CategoriesRepositoryContract.
     */
    protected $repository;

    /*
     * validator instance from CategoriesValidatorContract.
     */
    protected $validator;


    /**
     * BlogService constructor.
     * @param BlogRepositoryContract $repository
     * @param BlogValidatorContract $validator
     */
    public function __construct(BlogRepositoryContract $repository, BlogValidatorContract $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    /**
     * Validate request of categories;
     *
     * @param $data
     * @return void
     */
    private function validator($data): void
    {
        $this->validator->validations($data);
    }

    /**
     * Validate and store categories data.
     *
     * @param $data
     * @return bool
     * @throws /Exception
     */
    public function store($data): bool
    {
        $this->validator($data);
        DB::beginTransaction();

        try {

            $blogData = [
                'title' => $data['title'],
                'content' => $data['content'],
                'cover' => $this->storeFile($data['cover'], 'blog'),
                'category_id' => $data['category_id']
            ];

            $this->repository->store($blogData);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }

        return true;
    }

    /**
     * List all categories data;
     *
     * @return array
     */
    public function list(): array
    {
        $blog = $this->repository->list();
        $blogData = FractalFacade::collection($blog)
            ->transformWith(new BlogTransformer())
            ->toArray();
        return $blogData;
    }

    /**
     * Destroy category by id.
     *
     * @param int $id
     * @return bool
     * @throws /Exception
     */
    public function destroy(int $id): bool
    {
        DB::beginTransaction();

        try {
            $this->repository->destroy($id);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }

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
        $blog = $this->repository->show($id);
        $blogData = FractalFacade::item($blog)
            ->transformWith(new BlogTransformer())
            ->toArray();
        return $blogData;
    }

    /**
     * Update category data by id.
     *
     * @param array $data
     * @param int $id
     * @return bool
     * @throws /Exception
     */
    public function update(int $id, array $data): bool
    {
        $this->validator($data);
        DB::beginTransaction();

        try {
            $blog = $this->repository->show($id);
            if (!empty($data['cover'])) {
                $blogData = [
                    'title' => $data['title'],
                    'content' => $data['content'],
                    'cover' => $this->storeFile($data['cover'], 'blog'),
                    'category_id' => $data['category_id']
                ];

                unlink(storage_path('app/public/' . $blog['cover']));
            } else {
                $blogData = [
                    'title' => $data['title'],
                    'content' => $data['content'],
                    'cover' => $blog['cover'],
                    'category_id' => $data['category_id']
                ];
            }

            $this->repository->update($id, $blogData);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }

        return true;
    }
}
