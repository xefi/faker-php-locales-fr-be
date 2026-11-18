<?php

namespace Xefi\Faker\FrBe\Tests\Unit;

final class PhoneExtensionTest extends TestCase
{
    public function testPhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^0([24]\d{7}|(10|65|71|81|87)\d{6}|4[6-9]\d{7})$/', $this->faker->phoneNumber());
        }
    }

    public function testLandlinePhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^0([24]-\d{3}-\d{2}-\d{2}|(10|65|71|81|87)-\d{2}-\d{2}-\d{2})$/', $this->faker->dashedLandlinePhoneNumber());
        }
    }

    public function testCellPhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^04[6-9]\d \d{2} \d{2} \d{2}$/', $this->faker->spacedCellPhoneNumber());
        }
    }

    public function testIndicatoredPhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^\+32([24]\d{7}|(10|65|71|81|87)\d{6}|4[6-9]\d{7})$/', $this->faker->indicatoredPhoneNumber());
        }
    }

    public function testIndicatorIsSeparatedFromTheNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertStringStartsWith('+32 ', $this->faker->spacedIndicatoredPhoneNumber());
            $this->assertStringStartsWith('+32-', $this->faker->dashedIndicatoredPhoneNumber());
            $this->assertStringStartsWith('+32.', $this->faker->dottedIndicatoredPhoneNumber());
            $this->assertMatchesRegularExpression('/^\+32\d+$/', $this->faker->indicatoredPhoneNumber());
        }
    }
}
