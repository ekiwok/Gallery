<?php

use App\Repository\AlbumRepository;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityManagerInterface;
use Gallery\Entity\Album;

class AppRepositoryAlbumRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var EntityManagerInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private $objectManager;

    /**
     * @var AlbumRepository;
     */
    private $repository;

    public function setUp()
    {
        $this->objectManager = $this->createMock(EntityManagerInterface::class);
        $this->repository = new AlbumRepository($this->objectManager);

        $this->objectManager
            ->method('createQuery')
            ->willReturn($this->createMock(AbstractQuery::class));
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
