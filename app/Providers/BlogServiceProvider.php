<?php

namespace App\Providers;

use App\Contracts\Blog\BlogRepositoryContract;
use App\Contracts\Blog\BlogServiceContract;
use App\Contracts\Blog\BlogValidatorContract;
use App\Repositories\Blog\BlogRepository;
use App\Services\Blog\BlogService;
use App\Validations\Blog\BlogValidator;
use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
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
        $this->app->bind(BlogServiceContract::class, BlogService::class);
        $this->app->bind(BlogRepositoryContract::class, BlogRepository::class);
        $this->app->bind(BlogValidatorContract::class, BlogValidator::class);
    }
}
