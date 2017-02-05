<?php

namespace spec\Gallery\Entity;

use Gallery\Entity\Album;
use Gallery\Entity\Image;
use Gallery\Model\Url;
use Gallery\Model\UUID;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ImageSpec extends ObjectBehavior
{
    function it_is_initializable(UUID $uuid, Url $url, Album $album)
    {
        $this->beConstructedWith($uuid, $album, $url);

        $this->shouldHaveType(Image::class);

        $this->getUuid()->shouldBe($uuid);
        $this->getUrl()->shouldBe($url);
        $this->getAlbum()->shouldBe($album);
    }
}
