<?php

namespace Xefi\Faker\FrBe\Tests\Unit;

use Random\Randomizer;
use Xefi\Faker\FrBe\Extensions\CompanyExtension;

final class CompanyExtensionTest extends TestCase
{
    protected array $companies = [];

    protected function setUp(): void
    {
        parent::setUp();

        $companyExtension = new CompanyExtension(new Randomizer());
        $this->companies = (new \ReflectionClass($companyExtension))->getProperty('companies')->getValue($companyExtension);
    }

    public function testCompany()
    {
        $results = [];
        for ($i = 0; $i < count($this->companies); $i++) {
            $results[] = $this->faker->unique()->company();
        }

        $this->assertEqualsCanonicalizing(
            $this->companies,
            $results
        );
    }

    public function testCompanyNumber()
    {
        for ($i = 0; $i < 100; $i++) {
            $result = $this->faker->unique()->companyNumber();

            $this->assertIsString($result);
            $this->assertEquals(0, substr($result, 0, 1));
        }
    }

    public function testVat()
    {
        for ($i = 0; $i < 100; $i++) {
            $result = $this->faker->unique()->vat();

            $this->assertIsString($result);
            $this->assertEquals("BE0", substr($result, 0, 3));
            $this->assertEquals(12, strlen($result));
        }
    }
}
