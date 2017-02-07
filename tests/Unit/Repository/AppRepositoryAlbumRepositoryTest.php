<?php

use App\Repository\AlbumRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Gallery\Entity\Album;

class AppRepositoryAlbumRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ObjectManager|\PHPUnit_Framework_MockObject_MockObject
     */
    private $objectManager;

    /**
     * @var AlbumRepository;
     */
    private $repository;

    public function setUp()
    {
        $this->objectManager = $this->createMock(ObjectManager::class);
        $this->repository = new AlbumRepository($this->objectManager);
    }

    public function testAdd()
    {
        /** @var Album|\PHPUnit_Framework_MockObject_MockObject $album */
        $album = $this->createMock(Album::class);

        $this->objectManager->expects($this->once())
            ->method('persist')
            ->with($album);
        $this->objectManager->expects($this->once())
            ->method('flush');

        $this->repository->add($album);
    }

    public function testRemove()
    {
        /** @var Album|\PHPUnit_Framework_MockObject_MockObject $album */
        $album = $this->createMock(Album::class);

        $this->objectManager->expects($this->once())
            ->method('remove')
            ->with($album);
        $this->objectManager->expects($this->once())
            ->method('flush');

        $this->repository->remove($album);
    }
}
