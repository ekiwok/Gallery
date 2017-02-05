<?php

namespace spec\Gallery\Command;

use Gallery\Command\CreateAlbumCommand;
use Gallery\Model\UUID;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateAlbumCommandSpec extends ObjectBehavior
{
    function it_is_initializable(UUID $uuid)
    {
        $name = 'cats';
        $this->beConstructedWith($uuid, $name);

        $this->shouldHaveType(CreateAlbumCommand::class);

        $this->getUuid()->shouldBe($uuid);
        $this->getName()->shouldBe($name);
    }
}