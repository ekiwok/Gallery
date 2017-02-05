<?php

namespace Gallery\Entity;

use Gallery\Model\UUID;

class Album
{
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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return UUID
     */
    public function getUuid()
    {
        return $this->uuid;
    }
}
