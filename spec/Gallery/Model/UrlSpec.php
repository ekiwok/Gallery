<?php

namespace spec\Gallery\Model;

use Gallery\Model\Url;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UrlSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $domain = 'http://example.com';
        $this->beConstructedWith($domain);

        $this->shouldHaveType(Url::class);

        $this->getUrl()->shouldBe($domain);
    }

    function it_is_not_initializable_with_string_not_being_url()
    {
        $this->beConstructedWith('unix:/var/run/php5.6');

        $this->shouldThrow(\InvalidArgumentException::class)->duringInstantiation();
    }
}