<?php

namespace Gallery\Repository;

use Gallery\Entity\Image;

interface ImageRepositoryInterface
{
    public function add(Image $image);
}
