<?php

namespace spec\Gallery\Command;

use Gallery\Command\RemoveAlbumCommand;
use Gallery\Entity\Album;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RemoveAlbumCommandSpec extends ObjectBehavior
{
    function it_is_initializable(Album $album)
    {
        $this->beConstructedwith($album);

        $this->shouldHaveType(RemoveAlbumCommand::class);

        $this->getAlbum()->shouldBe($album);
    }
}
