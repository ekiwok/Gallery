<?php

namespace App\Http\Controllers;

use Gallery\Query\AlbumQuery;
use Gallery\Query\ImageQuery;

class AlbumController
{
    /**
     * @var AlbumQuery
     */
    private $albums;

    /**
     * @var ImageQuery
     */
    private $images;

    /**
     * @param AlbumQuery $albums
     * @param ImageQuery $images
     */
    public function __construct(AlbumQuery $albums, ImageQuery $images)
    {
        $this->albums = $albums;
        $this->images = $images;
    }

    public function showAlbumImages($albumUuid)
    {
        $album = $this->albums->findOneByUuid($albumUuid);

        if (is_null($album)) {
            abort(404);
        }

        $images = $this->images->findAllAlbumImages($album->getUuid());

        return view('album', compact('images'));
    }
}
