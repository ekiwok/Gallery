<?php

namespace Gallery\Command;

use Gallery\Entity\Album;

class RemoveAlbumCommand
{
    /**
     * @var Album
     */
    private $album;

    /**
     * @param Album $album
     */
    public function __construct(Album $album)
    {
        $this->album = $album;
    }

    /**
     * @return Album
     */
    public function getAlbum()
    {
        return $this->album;
    }
}
