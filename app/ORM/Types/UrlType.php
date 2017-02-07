<?php

namespace App\ORM\Types;

use Gallery\Model\Url;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class UrlType extends AbstractValueObjectType
{
    const NAME = 'url';

    /**
     * {@inheritdoc}
     */
    protected function getValueObjectClass()
    {
        return Url::class;
    }

    /**
     * {@inheritdoc}
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return 'text';
    }
}
