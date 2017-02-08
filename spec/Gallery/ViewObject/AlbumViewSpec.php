<?php

namespace spec\Gallery\ViewObject;

use Gallery\ViewObject\AlbumView;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AlbumViewSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith('22e19322-948b-42d6-9a61-03084bda8711', 'Dogs', '34', 'http://example.com');

        $this->shouldHaveType(AlbumView::class);
    }
}
