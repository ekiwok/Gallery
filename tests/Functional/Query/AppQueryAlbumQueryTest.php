<?php

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
}
