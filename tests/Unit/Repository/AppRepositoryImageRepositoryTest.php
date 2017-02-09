<?php

use App\Repository\ImageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Gallery\Entity\Image;

class AppRepositoryImageRepositoryTest extends TestCase
{
    /**
     * @var EntityManagerInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private $objectManager;

    /**
     * @var ImageRepository;
     */
    private $repository;

    public function setUp()
    {
        $this->objectManager = $this->createMock(EntityManagerInterface::class);
        $this->repository = new ImageRepository($this->objectManager);
    }

    public function testAdd()
    {
        /** @var Image|\PHPUnit_Framework_MockObject_MockObject $album */
        $album = $this->createMock(Image::class);

        $this->objectManager->expects($this->once())
            ->method('persist')
            ->with($album);
        $this->objectManager->expects($this->once())
            ->method('flush');

        $this->repository->add($album);
    }
}
