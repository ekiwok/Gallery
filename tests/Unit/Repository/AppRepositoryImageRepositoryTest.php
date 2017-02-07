<?php

use App\Repository\ImageRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Gallery\Entity\Image;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AppRepositoryImageRepositoryTest extends TestCase
{
    /**
     * @var ObjectManager|\PHPUnit_Framework_MockObject_MockObject
     */
    private $objectManager;

    /**
     * @var ImageRepository;
     */
    private $repository;

    public function setUp()
    {
        $this->objectManager = $this->createMock(ObjectManager::class);
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
