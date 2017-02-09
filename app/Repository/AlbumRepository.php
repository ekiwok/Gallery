<?php

namespace App\Repository;

use Gallery\Entity\Album;
use Gallery\Entity\Image;
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
        $query = $this->objectManager->createQuery(sprintf('DELETE FROM %s i WHERE i.album = :uuid', Image::class));
        $query->setParameter('uuid', (string) $album->getUuid());
        $query->execute();

        $this->concreteRemove($album);
    }
}
