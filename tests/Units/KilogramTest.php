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

class KilogramTest extends TestCase
{
    public function test_it_has_correct_relative_to_kg_set(): void
    {
        $this->assertEquals(1, Kilogram::RELATIVE_TO_KG);
    }

    /**
     * @dataProvider conversionTestCases
     */
    public function test_it_converts(float $kilograms, float $expected, string $unit): void
    {
        $converted = (new Kilogram($kilograms))
            ->to($unit);

        $this->assertEquals($expected, $converted->amount());
    }

    public function test_it_formats_amount(): void
    {
        $gram = new Kilogram(25);

        $this->assertEquals('25kg', $gram->formatted());
        $this->assertEquals('25 kilograms', $gram->formatted('%s kilograms'));
    }

    public function conversionTestCases(): \Generator
    {
        yield 'to grams' => [1.25, 1250, Gram::class];
        yield 'to milligrams' => [12, 12000000.0 , Milligram::class];
        yield 'to ounces' => [6, 211.644, Ounce::class];
        yield 'to pounds' => [3.75, 8.26725, Pound::class];
        yield 'to stones' => [85, 13.38495, Stone::class];
        yield 'to tonnes' => [1293, 1.293, Ton::class];
    }
}
