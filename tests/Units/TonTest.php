<?php

namespace JacobFitzp\WeightConversions\Tests\Units;

use JacobFitzp\WeightConversions\Units\Gram;
use JacobFitzp\WeightConversions\Units\Kilogram;
use JacobFitzp\WeightConversions\Units\Milligram;
use JacobFitzp\WeightConversions\Units\Ounce;
use JacobFitzp\WeightConversions\Units\Pound;
use JacobFitzp\WeightConversions\Units\Stone;
use JacobFitzp\WeightConversions\Units\Ton;
use PHPUnit\Framework\TestCase;

class TonTest extends TestCase
{
    public function test_it_has_correct_relative_to_kg_set(): void
    {
        $this->assertEquals(0.001, Ton::RELATIVE_TO_KG);
    }

    /**
     * @dataProvider conversionTestCases
     */
    public function test_it_converts(float $tonnes, float $expected, string $unit): void
    {
        $converted = (new Ton($tonnes))
            ->to($unit);

        $this->assertEquals($expected, $converted->amount());
    }

    public function test_it_formats_amount(): void
    {
        $gram = new Ton(2.38);

        $this->assertEquals('2.38T', $gram->formatted());
        $this->assertEquals('2.38 tonnes', $gram->formatted('%s tonnes'));
    }

    public function conversionTestCases(): \Generator
    {
        yield 'to grams' => [0.21, 210000, Gram::class];
        yield 'to kilograms' => [0.163, 163.0, Kilogram::class];
        yield 'to milligrams' => [0.0034, 3400000.0, Milligram::class];
        yield 'to ounces' => [0.00017, 5.996580000000001, Ounce::class];
        yield 'to pounds' => [0.0037, 8.157020000000001, Pound::class];
        yield 'to stones' => [0.52, 81.8844, Stone::class];
    }
}
