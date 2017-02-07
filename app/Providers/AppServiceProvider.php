<?php

namespace App\Providers;

use App\Repository\AlbumRepository;
use App\Repository\ImageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Gallery\Entity\Album;
use Gallery\Query\AlbumQuery;
use Gallery\Repository\AlbumRepositoryInterface;
use Gallery\Repository\ImageRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AlbumRepositoryInterface::class, function () {
            return new AlbumRepository(app(EntityManagerInterface::class));
        });
        $this->app->bind(ImageRepositoryInterface::class, function () {
            return new ImageRepository(app(EntityManagerInterface::class));
        });
        $this->app->bind(AlbumQuery::class, function () {
            return app(EntityManagerInterface::class)->getRepository(Album::class);
        });
    }
}
