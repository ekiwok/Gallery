<?php

namespace spec\Gallery\Handler;

use Gallery\Command\CreateAlbumCommand;
use Gallery\Entity\Album;
use Gallery\Handler\CreateAlbumHandler;
use Gallery\Model\UUID;
use Gallery\Repository\AlbumRepositoryInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateAlbumHandlerSpec extends ObjectBehavior
{
    function it_is_initializable(AlbumRepositoryInterface $albums)
    {
        $this->beConstructedWith($albums);

        $this->shouldHaveType(CreateAlbumHandler::class);
    }

    function it_adds_new_album(AlbumRepositoryInterface $albums, UUID $uuid, CreateAlbumCommand $command)
    {
        $command->getUuid()->willReturn($uuid);
        $command->getName()->willReturn('dogs');

        $this->beConstructedWith($albums);

        $albums->add(Argument::type(Album::class))->shouldBeCalled();

        $this->handle($command);
    }
}
