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

class MilligramTest extends TestCase
{
    public function test_it_has_correct_relative_to_kg_set(): void
    {
        $this->assertEquals(1000000, Milligram::RELATIVE_TO_KG);
    }

    /**
     * @dataProvider conversionTestCases
     */
    public function test_it_converts(float $milligrams, float $expected, string $unit): void
    {
        $converted = (new Milligram($milligrams))
            ->to($unit);

        $this->assertEquals($expected, $converted->amount());
    }

    public function test_it_formats_amount(): void
    {
        $gram = new Milligram(46);

        $this->assertEquals('46mg', $gram->formatted());
        $this->assertEquals('46 milligrams', $gram->formatted('%s milligrams'));
    }

    public function conversionTestCases(): \Generator
    {
        yield 'to grams' => [48, 0.048, Gram::class];
        yield 'to kilograms' => [186, 0.000186 , Kilogram::class];
        yield 'to ounces' => [1245, 0.043916130000000005, Ounce::class];
        yield 'to pounds' => [23000, 0.0507058, Pound::class];
        yield 'to stones' => [126000, 0.01984122, Stone::class];
        yield 'to tonnes' => [2783000, 0.002783, Ton::class];
    }
}
