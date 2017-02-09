<?php

use Doctrine\ORM\EntityManagerInterface;

abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * @var \Doctrine\DBAL\Connection
     */
    static protected $connection;

    static public function setUpBeforeClass()
    {
        parent::setUpBeforeClass();

        if (!self::$connection) {
            return;
        }

        if (!self::$connection->isConnected()) {
            self::$connection->connect();
        }

        self::$connection->beginTransaction();
    }

    static public function tearDownAfterClass()
    {
        if (self::$connection && self::$connection->isTransactionActive()) {
            self::$connection->rollBack();
        }
    }

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        $em = app(EntityManagerInterface::class);
        self::$connection = $em->getConnection();

        return $app;
    }
}
