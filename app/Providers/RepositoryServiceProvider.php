<?php

namespace App\Providers;

use App\Repositories\Article\ArticleRepository;
use App\Repositories\Article\CommentRepository;
use App\Repositories\Interfaces\Article\ArticleInterfaces;
use App\Repositories\Interfaces\Article\CommentInterfaces;
use Illuminate\Support\ServiceProvider;

use App\Repositories\Interfaces\User\UserInterfaces;

use App\Repositories\User\UserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            UserInterfaces::class,
            UserRepository::class
        );
        $this->app->bind(
            ArticleInterfaces::class,
            ArticleRepository::class
        );
        $this->app->bind(
            CommentInterfaces::class,
            CommentRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
