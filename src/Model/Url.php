<?php

namespace Gallery\Model;

class Url
{
    /**
     * @var string
     */
    private $url;

    /**
     * @param $url
     */
    public function __construct($url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            throw new \InvalidArgumentException(sprintf("%s is not a valid url", $url));
        }

        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}
