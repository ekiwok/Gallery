<?php

use Gallery\Entity\Album;
use Gallery\Query\AlbumQuery;

class AppQueryAlbumQueryTest extends TestCase
{
    /**
     * @var AlbumQuery
     */
    private $albumQuery;

    public function testFindAllAlbums()
    {
        $albumsViews = app(AlbumQuery::class)->findAllAlbums();

        $this->assertEquals(4, count($albumsViews));
    }

    public function testFindOneByUuid()
    {
        /** @var Album $album */
        $album = app(AlbumQuery::class)->findOneByUuid('aee7c4a8-895e-4108-abb5-225d0c0e3ef5');

        $this->assertEquals('Landscapes', $album->getName());
    }

    public function testFindOneByNotExistingUuid()
    {
        /** @var Album $album */
        $album = app(AlbumQuery::class)->findOneByUuid('\'"\\drop database albums;');

        $this->assertNull($album);
    }
}
