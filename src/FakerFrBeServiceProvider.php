<?php

namespace Xefi\Faker\FrBe;

use Xefi\Faker\FrBe\Extensions\AddressExtension;
use Xefi\Faker\FrBe\Extensions\ColorsExtension;
use Xefi\Faker\FrBe\Extensions\CompanyExtension;
use Xefi\Faker\FrBe\Extensions\FinancialExtension;
use Xefi\Faker\FrBe\Extensions\PersonExtension;
use Xefi\Faker\FrBe\Extensions\TextExtension;
use Xefi\Faker\Providers\Provider;

class FakerFrBeServiceProvider extends Provider
{
    public function boot(): void
    {
        $this->extensions([
            AddressExtension::class,
            ColorsExtension::class,
            CompanyExtension::class,
            FinancialExtension::class,
            PersonExtension::class,
            TextExtension::class,
        ]);
    }
}
