<?php

namespace App\Repository;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;

abstract class AbstractDoctrineRepository
{
    /**
     * @var EntityManagerInterface
     */
    protected $objectManager;

    /**
     * @param EntityManagerInterface $objectManager
     */
    public function __construct(EntityManagerInterface $objectManager)
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
