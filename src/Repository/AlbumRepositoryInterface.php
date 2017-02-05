<?php

namespace Gallery\Repository;

use Gallery\Entity\Album;

interface AlbumRepositoryInterface
{
    public function add(Album $album);

    public function remove(Album $album);
}
