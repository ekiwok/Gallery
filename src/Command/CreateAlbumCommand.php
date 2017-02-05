<?php

namespace Gallery\Command;

use Gallery\Model\UUID;

class CreateAlbumCommand
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
     * @param UUID $uuid
     * @param string $name
     */
    public function __construct(UUID $uuid, $name)
    {
        $this->uuid = $uuid;
        $this->name = $name;
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
}
