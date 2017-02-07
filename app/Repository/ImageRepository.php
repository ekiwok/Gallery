<?php

namespace App\Repository;

use Doctrine\Common\Persistence\ObjectManager;
use Gallery\Entity\Image;
use Gallery\Repository\ImageRepositoryInterface;

class ImageRepository extends AbstractDoctrineRepository implements ImageRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function add(Image $image)
    {
        $this->concreteAdd($image);
    }
}
