<?php

namespace App\Providers;

use App\Repositories\Contracts\{
    CategoryRepositoryInterface, 
    ProductRepositoryInterface
};

use App\Repositories\Core\Eloquent\EloquentProductRepository;
use App\Repositories\Core\QueryBuilder\QueryBuilderCategoryRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            ProductRepositoryInterface::class,
            EloquentProductRepository::class
        );

        $this->app->bind(
            CategoryRepositoryInterface::class, 
            QueryBuilderCategoryRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
