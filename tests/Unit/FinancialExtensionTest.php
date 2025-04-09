<?php

namespace Xefi\Faker\FrBe\Tests\Unit;

use Xefi\Faker\Calculators\Iban;

final class FinancialExtensionTest extends TestCase
{
    public function testIban()
    {
        $iban = $this->faker->iban();

        $this->assertEquals(16, strlen($iban));
        $this->assertStringStartsWith('BE', $iban);
        $this->assertTrue(Iban::isValid($iban));
    }
}
