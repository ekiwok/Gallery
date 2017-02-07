<?php

namespace App\ORM\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Platforms\MySqlPlatform;
use Doctrine\DBAL\Types\Type;

abstract class AbstractValueObjectType extends Type
{
    const NAME = 'value_object';

    /**
     * {@inheritdoc}
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return (string) $value;
    }

    /**
     * {@inheritdoc}
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $class = $this->getValueObjectClass();

        return new $class($value);
    }

    /**
     * @return string
     */
    abstract protected function getValueObjectClass();

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return static::NAME;
    }

}
