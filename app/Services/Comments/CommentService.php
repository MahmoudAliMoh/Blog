<?php

namespace App\Services\Comments;



use App\Contracts\Comments\CommentRepositoryContract;
use App\Contracts\Comments\CommentServiceContract;
use App\Contracts\Comments\CommentValidatorContract;
use App\Transformers\BlogTransformer;
use App\Utilities\Services\UploadFiles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Fractal\FractalFacade;

class CommentService implements CommentServiceContract
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


    public function __construct(CommentRepositoryContract $repository, CommentValidatorContract $validator)
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
     * @param $id
     * @return bool
     * @throws /Exception
     */
    public function store($id, $data): bool
    {
        $this->validator($data);
        DB::beginTransaction();

        try {

            $commentData = [
                'comment' => $data['comment'],
                'blog_id' => $id,
                'user_id' => Auth::user()->id,
            ];

            $this->repository->store($commentData);

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
     * @param $id
     * @return array
     */
    public function list($id): array
    {
        return $this->repository->list($id);
    }
}
