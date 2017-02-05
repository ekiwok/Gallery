<?php

namespace Gallery\Model;

use Webmozart\Assert\Assert;

class UUID
{
    /**
     * @var string
     */
    private $uuid;

    public function __construct($uuid)
    {
        Assert::uuid($uuid);

        $this->uuid = $uuid;
    }

    /**
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->uuid;
    }
}
