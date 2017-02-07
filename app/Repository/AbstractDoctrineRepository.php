<?php

namespace App\Repository;

use Doctrine\Common\Persistence\ObjectManager;

abstract class AbstractDoctrineRepository
{
    /**
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    protected function concreteAdd($obj)
    {
        $this->objectManager->persist($obj);
        $this->objectManager->flush();
    }

    protected function concreteRemove($obj)
    {
        $this->objectManager->remove($obj);
        $this->objectManager->flush();
    }

}
