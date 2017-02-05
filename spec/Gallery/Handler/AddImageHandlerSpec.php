<?php

namespace spec\Gallery\Handler;

use Gallery\Command\AddImageCommand;
use Gallery\Entity\Image;
use Gallery\Entity\Album;
use Gallery\Handler\AddImageHandler;
use Gallery\Model\Url;
use Gallery\Model\UUID;
use Gallery\Repository\ImageRepositoryInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AddImageHandlerSpec extends ObjectBehavior
{
    function it_is_initializable(ImageRepositoryInterface $images)
    {
        $this->beConstructedWith($images);

        $this->shouldHaveType(AddImageHandler::class);
    }

    function it_adds_image_to_a_given_album(ImageRepositoryInterface $images, UUID $uuid, Album $album, Url $url)
    {
        $this->beConstructedWith($images);

        $images->add(Argument::type(Image::class))->shouldBeCalled();

        $this->handle(new AddImageCommand(
            $uuid->getWrappedObject(),
            $url->getWrappedObject(),
            $album->getWrappedObject()
        ));
    }
}
