<?php

namespace Xefi\Faker\FrBe\Extensions;

use Xefi\Faker\Extensions\FinancialExtension as BaseFinancialExtension;

class FinancialExtension extends BaseFinancialExtension
{
    public function getLocale(): string|null
    {
        return 'fr_BE';
    }

    public function iban(?string $countryCode = null, ?string $format = null): string
    {
        if ($countryCode === null) {
            $countryCode = 'BE';
        }

        if ($format === null) {
            $format = str_repeat('{d}', 12);
        }

        return parent::iban($countryCode, $format);
    }
}
