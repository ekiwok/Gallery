<?php

namespace Gallery\Handler;

use Gallery\Command\AddImageCommand;
use Gallery\Entity\Image;
use Gallery\Repository\ImageRepositoryInterface;

class AddImageHandler
{
    /**
     * @var ImageRepositoryInterface
     */
    private $images;

    /**
     * @param ImageRepositoryInterface $images
     */
    public function __construct(ImageRepositoryInterface $images)
    {
        $this->images = $images;
    }

    /**
     * @param AddImageCommand $command
     */
    public function handle(AddImageCommand $command)
    {
        $image = new Image($command->getUuid(), $command->getAlbum(), $command->getUrl());

        $this->images->add($image);
    }
}
