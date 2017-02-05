<?php

namespace Gallery\Entity;

use Gallery\Model\Url;
use Gallery\Model\UUID;

class Image
{
    /**
     * @param UUID $uuid
     * @param Album $album
     * @param Url $url
     */
    public function __construct(UUID $uuid, Album $album, Url $url)
    {
        $this->uuid = $uuid;
        $this->album = $album;
        $this->url = $url;
    }

    /**
     * @return mixed
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
