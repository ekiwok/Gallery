<?php

namespace spec\Gallery\Model;

use Gallery\Model\UUID;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UUIDSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith('0c30cc22-3350-4b2b-912f-5becae287011');

        $this->shouldHaveType(UUID::class);

        $this->getUuid()->shouldBe('0c30cc22-3350-4b2b-912f-5becae287011');
    }

    function it_should_not_be_constructed_with_string_not_being_valid_uui()
    {
        $this->beConstructedWith('test');

        $this->shouldThrow(\InvalidArgumentException::class)->duringInstantiation();
    }
}