<?php

namespace Gallery\Handler;

use Gallery\Command\RemoveAlbumCommand;
use Gallery\Repository\AlbumRepositoryInterface;

class RemoveAlbumHandler
{
    /**
     * @var AlbumRepositoryInterface
     */
    private $albums;

    /**
     * @param AlbumRepositoryInterface $albums
     */
    public function __construct(AlbumRepositoryInterface $albums)
    {
        $this->albums = $albums;
    }

    /**
     * @param RemoveAlbumCommand $command
     */
    public function handle(RemoveAlbumCommand $command)
    {
        $album = $command->getAlbum();

        $this->albums->remove($album);
    }
}
