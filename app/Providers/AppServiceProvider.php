<?php

namespace App\Providers;

use App\Repository\AlbumRepository;
use App\Repository\ImageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Gallery\Command\AddImageCommand;
use Gallery\Command\CreateAlbumCommand;
use Gallery\Command\RemoveAlbumCommand;
use Gallery\Entity\Album;
use Gallery\Entity\Image;
use Gallery\Handler\AddImageHandler;
use Gallery\Handler\CreateAlbumHandler;
use Gallery\Handler\RemoveAlbumHandler;
use Gallery\Query\AlbumQuery;
use Gallery\Query\ImageQuery;
use Gallery\Repository\AlbumRepositoryInterface;
use Gallery\Repository\ImageRepositoryInterface;
use Illuminate\Bus\Dispatcher;
use Illuminate\Support\ServiceProvider;
use Ramsey\Uuid\UuidFactory;
use Ramsey\Uuid\UuidFactoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $dispatcher)
    {
        $dispatcher->map([
            CreateAlbumCommand::class => CreateAlbumHandler::class,
            RemoveAlbumCommand::class => RemoveAlbumHandler::class,
            AddImageCommand::class => AddImageHandler::class,
        ]);
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
        $this->app->bind(ImageQuery::class, function () {
            return app(EntityManagerInterface::class)->getRepository(Image::class);
        });
        $this->app->bind(UuidFactoryInterface::class, function () {
            return new UuidFactory();
        });
    }
}
