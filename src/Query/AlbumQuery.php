<?php

namespace Gallery\Query;

use Gallery\Entity\Album;
use Gallery\ViewObject\AlbumView;

interface AlbumQuery
{
    /**
     * @return AlbumView[]
     */
    public function findAllAlbums();

    /**
     * @return Album
     */
    public function findOneByUuid($uuid);
}
