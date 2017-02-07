<?php

namespace App\ORM\Types;

use Gallery\Model\UUID;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class UUIDType extends AbstractValueObjectType
{
    const NAME = 'uuid';

    /**
     * {@inheritdoc}
     */
    protected function getValueObjectClass()
    {
        return UUID::class;
    }

    /**
     * {@inheritdoc}
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return 'VARCHAR(36)';
    }
}
