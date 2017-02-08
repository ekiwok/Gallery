<?php

use Gallery\Entity\Album;
use Gallery\Model\UUID;
use Gallery\Query\AlbumQuery;
use Gallery\Query\ImageQuery;

class AppQueryImageQueryTest extends TestCase
{
    /**
     * @var AlbumQuery
     */
    private $albumQuery;

    public function testFindAllAlbums()
    {
        $imagesQuery = app(ImageQuery::class);
        $images = $imagesQuery->findAllAlbumImages(new UUID('237bdd9c-4dad-4c51-9b7b-257b0786e6ec'));

        $this->assertEquals(7, count($images));
    }
}
