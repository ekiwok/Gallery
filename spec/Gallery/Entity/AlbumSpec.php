<?php

namespace spec\Gallery\Entity;

use Gallery\Entity\Album;
use Gallery\Model\UUID;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AlbumSpec extends ObjectBehavior
{
    function it_is_initalizable(UUID $uuid)
    {
        $name = 'memories';
        $this->beConstructedWith($uuid, $name);

        $this->shouldHaveType(Album::class);

        $this->getUuid()->shouldBe($uuid);
        $this->getName()->shouldBe($name);
    }
}
