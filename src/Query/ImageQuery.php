<?php

namespace Gallery\Query;

use Gallery\Entity\Image;
use Gallery\Model\UUID;

interface ImageQuery
{
    /**
     * @param UUID $albumUUID
     *
     * @return Image[]
     */
    public function findAllAlbumImages(UUID $albumUUID);
}
