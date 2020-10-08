<?php

namespace Mpp\LemonWayClientBundle\Tests\Unit\Client;

use Mpp\LemonWayClientBundle\Client\LemonWayClientRegistryInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

abstract class LemonWayClientTest extends KernelTestCase
{
    /**
     * @var LemonWayClientRegistryInterface
     */
    protected static $registry;

    public static function setUpBeforeClass()
    {
        self::bootKernel();

        self::$registry = self::$container->get(LemonWayClientRegistryInterface::class);
    }
}
