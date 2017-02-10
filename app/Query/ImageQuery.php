<?php

namespace App\Query;

use Doctrine\ORM\EntityRepository;
use Gallery\Model\UUID;
use Gallery\Query\ImageQuery as ImageQueryInterface;

class ImageQuery extends EntityRepository implements ImageQueryInterface
{
    /**
     * {@inheritdoc}
     */
    public function findAllAlbumImages(UUID $albumUUID)
    {
        return $this->findBy(['album' => (string) $albumUUID]);
    }
}
