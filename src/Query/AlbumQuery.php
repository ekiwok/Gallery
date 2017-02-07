<?php

namespace Gallery\Query;

use Gallery\ViewObject\AlbumView;

interface AlbumQuery
{
    /**
     * @return AlbumView[]
     */
    public function findAllAlbums();
}
