<?php

namespace Xefi\Faker\FrBe\Tests\Unit;

use Xefi\Faker\Container\Container;
use Xefi\Faker\FrBe\FakerFrBeServiceProvider;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected Container $faker;

    protected function setUp(): void
    {
        Container::packageManifestPath('/tmp/packages.php');

        (new FakerFrBeServiceProvider())->boot();

        $this->faker = (new Container(false))->locale('fr_BE');
    }
}
