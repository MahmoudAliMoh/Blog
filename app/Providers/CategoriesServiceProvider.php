<?php

namespace App\Providers;

use App\Contracts\Categories\CategoryRepositoryContract;
use App\Contracts\Categories\CategoryServiceContract;
use App\Contracts\Categories\CategoryValidatorContract;
use App\Repositories\Categories\CategoriesRepository;
use App\Services\Categories\CategoriesService;
use App\Validations\Categories\CategoriesValidator;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class CategoriesServiceProvider extends ServiceProvider
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
        $this->app->bind(CategoryServiceContract::class, CategoriesService::class);
        $this->app->bind(CategoryRepositoryContract::class, CategoriesRepository::class);
        $this->app->bind(CategoryValidatorContract::class, CategoriesValidator::class);
    }
}
