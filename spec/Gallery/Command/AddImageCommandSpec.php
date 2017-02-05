<?php

namespace spec\Gallery\Command;

use Gallery\Entity\Album;
use Gallery\Model\Url;
use Gallery\Model\UUID;
use Gallery\Command\AddImageCommand;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AddImageCommandSpec extends ObjectBehavior
{
    public function it_is_initializable(UUID $uuid, Url $url, Album $album)
    {
        $this->beConstructedWith($uuid, $url, $album);

        $this->shouldHaveType(AddImageCommand::class);

        $this->getUuid()->shouldBe($uuid);
        $this->getUrl()->shouldBe($url);
        $this->getAlbum()->shouldBe($album);
    }
}
