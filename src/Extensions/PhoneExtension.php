<?php

namespace Xefi\Faker\FrBe\Extensions;

use Xefi\Faker\Extensions\PhoneExtension as BasePhoneExtension;

class PhoneExtension extends BasePhoneExtension
{
    public string $defaultPrefix = '0';

    public string $indicator = '+32';

    /**
     * Get the locale handled by this extension.
     *
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return 'fr_BE';
    }

    protected array $landlineFormats = [
        '2{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '4{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '10{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '65{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '71{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '81{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '87{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
    ];

    protected array $cellFormats = [
        '46{d}{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '47{d}{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '48{d}{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '49{d}{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
    ];
}
