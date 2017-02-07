<?php

use App\ORM\Types\UUIDType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use Gallery\Model\UUID;

class AppORMTypesUUIDTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var UUIDType
     */
    private $type;

    /**
     * @var AbstractPlatform
     */
    private $platform;

    public static function setUpBeforeClass()
    {
        Type::addType(self::class, UUIDType::class);
    }

    /**
     * @throws \Doctrine\DBAL\DBALException
     */
    public function setUp()
    {
        $this->type = Type::getType(self::class);
        $this->platform = $this->createMock(AbstractPlatform::class);
    }

    public function testConvertToDatabaseValue()
    {
        $uuid = '0d0098b4-3f71-4a79-a334-2c0eebb83feb';
        $converted = $this->type->convertToDatabaseValue(new UUID($uuid), $this->platform);

        $this->assertEquals($uuid, $converted);
    }

    public function testConvertToPHPValue()
    {
        $uuid = '0d0098b4-3f71-4a79-a334-2c0eebb83feb';

        /** @var UUID $converted */
        $converted = $this->type->convertToPHPValue($uuid, $this->platform);

        $this->assertInstanceOf(UUID::class, $converted);
        $this->assertEquals($uuid, $converted->getUuid());
    }

    public function testGetSQLDeclaration()
    {
        $sql = $this->type->getSQLDeclaration([], $this->platform);

        $this->assertEquals('VARCHAR(36)', $sql);
    }

    public function testGetName()
    {
        $name = $this->type->getName();

        $this->assertEquals(UUIDType::NAME, $name);
    }
}
