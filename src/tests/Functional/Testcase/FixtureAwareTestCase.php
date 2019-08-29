<?php

namespace App\Tests\Functional\Testcase;

use DAMA\DoctrineTestBundle\Doctrine\DBAL\StaticDriver;
use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

class FixtureAwareTestCase extends WebTestCase
{
    /** @var  Client $client */
    protected $client;
    /** @var  ContainerInterface $container */
    protected static $container;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        StaticDriver::beginTransaction();
        $this->client = parent::createClient();

        self::$container = $this->client->getContainer();

        // Make sure we are in the test environment
        if (self::$container->get('kernel')->getEnvironment() !== 'test') {
            throw new \LogicException('Primer must be executed in the test environment');
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function setUpBeforeClass(): void
    {
        StaticDriver::setKeepStaticConnections(true);
    }


    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        StaticDriver::rollBack();
    }

    /**
     * {@inheritdoc}
     */
    public static function tearDownAfterClass(): void
    {
        StaticDriver::setKeepStaticConnections(false);
    }
}
