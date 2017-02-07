<?php

namespace App\Repository;

use Gallery\Entity\Album;
use Gallery\Repository\AlbumRepositoryInterface;

class AlbumRepository extends AbstractDoctrineRepository implements AlbumRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function add(Album $album)
    {
        $this->concreteAdd($album);
    }

    /**
     * {@inheritdoc}
     */
    public function remove(Album $album)
    {
        $this->concreteRemove($album);
    }
}
