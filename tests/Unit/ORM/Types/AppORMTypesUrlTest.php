<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Doctrine\DBAL\Types\Type;
use App\ORM\Types\UrlType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Gallery\Model\Url;

class AppORMTypesUrlTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var UrlType
     */
    private $type;

    /**
     * @var AbstractPlatform
     */
    private $platform;

    public static function setUpBeforeClass()
    {
        Type::addType(self::class, UrlType::class);
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
        $url = 'http://example.com';
        $converted = $this->type->convertToDatabaseValue(new Url($url), $this->platform);

        $this->assertEquals($url, $converted);
    }

    public function testConvertToPHPValue()
    {
        $url = 'http://example.com';

        /** @var Url $converted */
        $converted = $this->type->convertToPHPValue($url, $this->platform);

        $this->assertInstanceOf(Url::class, $converted);
        $this->assertEquals($url, $converted->getUrl());
    }

    public function testGetSQLDeclaration()
    {
        $sql = $this->type->getSQLDeclaration([], $this->platform);

        $this->assertEquals('text', $sql);
    }

    public function testGetName()
    {
        $name = $this->type->getName();

        $this->assertEquals(UrlType::NAME, $name);
    }
}
