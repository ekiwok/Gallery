<?php

namespace Gallery\Handler;

use Gallery\Command\CreateAlbumCommand;
use Gallery\Entity\Album;
use Gallery\Repository\AlbumRepositoryInterface;

class CreateAlbumHandler
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
     * @param CreateAlbumCommand $command
     */
    public function handle(CreateAlbumCommand $command)
    {
        $album = new Album($command->getUuid(), $command->getName());

        $this->albums->add($album);
    }
}
