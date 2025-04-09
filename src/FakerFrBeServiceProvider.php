<?php

namespace Xefi\Faker\FrBe;

use Xefi\Faker\FrBe\Extensions\AddressExtension;
use Xefi\Faker\Providers\Provider;

class FakerFrBeServiceProvider extends Provider
{
    public function boot(): void
    {
        $this->extensions([
            AddressExtension::class
        ]);
    }
}
