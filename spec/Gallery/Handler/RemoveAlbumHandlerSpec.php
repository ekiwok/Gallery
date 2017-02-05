<?php

namespace spec\Gallery\Handler;

use Gallery\Command\RemoveAlbumCommand;
use Gallery\Entity\Album;
use Gallery\Handler\RemoveAlbumHandler;
use Gallery\Repository\AlbumRepositoryInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RemoveAlbumHandlerSpec extends ObjectBehavior
{
    public function it_is_initializable(AlbumRepositoryInterface $albums)
    {
        $this->beConstructedWith($albums);

        $this->shouldHaveType(RemoveAlbumHandler::class);
    }

    public function it_removes_given_album(AlbumRepositoryInterface $albums, Album $album)
    {
        $this->beConstructedWith($albums);

        $albums->remove($album)->shouldBeCalled();

        $this->handle(new RemoveAlbumCommand($album->getWrappedObject()));
    }
}
