<?php

namespace Gallery\ViewObject;

use Gallery\Model\UUID;

class AlbumView
{
    /**
     * @var UUID
     */
    private $uuid;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $count;

    /**
     * @param string $uuid
     * @param string $name
     * @param string $count
     */
    public function __construct($uuid, $name, $count)
    {
        $this->uuid = new UUID($uuid);
        $this->name = $name;
        $this->count = (int) $count;
    }

    /**
     * @return UUID
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }
}
