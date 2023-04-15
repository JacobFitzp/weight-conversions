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

class PoundTest extends TestCase
{
    public function test_it_has_correct_relative_to_kg_set(): void
    {
        $this->assertEquals(2.2046, Pound::RELATIVE_TO_KG);
    }

    /**
     * @dataProvider conversionTestCases
     */
    public function test_it_converts(float $pounds, float $expected, string $unit): void
    {
        $converted = (new Pound($pounds))
            ->to($unit);

        $this->assertEquals($expected, $converted->amount());
    }

    public function test_it_formats_amount(): void
    {
        $gram = new Pound(253);

        $this->assertEquals('253lb', $gram->formatted());
        $this->assertEquals('253 pounds', $gram->formatted('%s pounds'));
    }

    public function conversionTestCases(): \Generator
    {
        yield 'to grams' => [21, 9525.537512473917, Gram::class];
        yield 'to kilograms' => [12, 5.443164292842239, Kilogram::class];
        yield 'to milligrams' => [1.2, 544316.4292842238, Milligram::class];
        yield 'to ounces' => [0.59, 9.44010704889776, Ounce::class];
        yield 'to stones' => [78, 5.5713780277601375, Stone::class];
        yield 'to tonnes' => [386, 0.17508845141975868, Ton::class];
    }
}
