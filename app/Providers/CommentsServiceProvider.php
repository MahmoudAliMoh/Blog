<?php

namespace App\Providers;


use App\Contracts\Comments\CommentRepositoryContract;
use App\Contracts\Comments\CommentServiceContract;
use App\Contracts\Comments\CommentValidatorContract;
use App\Repositories\Comments\CommentRepository;
use App\Services\Comments\CommentService;
use App\Validations\Comments\CommentValidator;
use Illuminate\Support\ServiceProvider;

class CommentsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->bind(CommentServiceContract::class, CommentService::class);
        $this->app->bind(CommentRepositoryContract::class, CommentRepository::class);
        $this->app->bind(CommentValidatorContract::class, CommentValidator::class);
    }
}
