<?php

namespace Gallery\Command;

use Gallery\Entity\Album;
use Gallery\Model\Url;
use Gallery\Model\UUID;

class AddImageCommand
{
    /**
     * @param UUID $uuid
     * @param Url $url
     * @param Album $album
     */
    public function __construct(UUID $uuid, Url $url, Album $album)
    {
        $this->uuid = $uuid;
        $this->url = $url;
        $this->album = $album;
    }

    /**
     * @return Album
     */
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * @return Url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return UUID
     */
    public function getUuid()
    {
        return $this->uuid;
    }
}
