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

class GramTest extends TestCase
{
    public function test_it_has_correct_relative_to_kg_set(): void
    {
        $this->assertEquals(1000, Gram::RELATIVE_TO_KG);
    }

    /**
     * @dataProvider conversionTestCases
     */
    public function test_it_converts(float $grams, float $expected, string $unit): void
    {
        $converted = (new Gram($grams))
            ->to($unit);

        $this->assertEquals($expected, $converted->amount());
    }

    public function test_it_formats_amount(): void
    {
        $gram = new Gram(750);

        $this->assertEquals('750g', $gram->formatted());
        $this->assertEquals('750 grams', $gram->formatted('%s grams'));
    }

    public function conversionTestCases(): \Generator
    {
        yield 'to kilograms' => [1256, 1.256, Kilogram::class];
        yield 'to milligrams' => [123, 123000.0, Milligram::class];
        yield 'to ounces' => [456, 16.084944, Ounce::class];
        yield 'to pounds' => [926, 2.0414596, Pound::class];
        yield 'to stones' => [12500, 1.968375, Stone::class];
        yield 'to tonnes' => [267000, 0.267, Ton::class];
    }
}
