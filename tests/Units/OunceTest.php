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

class OunceTest extends TestCase
{
    public function test_it_has_correct_relative_to_kg_set(): void
    {
        $this->assertEquals(35.274, Ounce::RELATIVE_TO_KG);
    }

    /**
     * @dataProvider conversionTestCases
     */
    public function test_it_converts(float $ounces, float $expected, string $unit): void
    {
        $converted = (new Ounce($ounces))
            ->to($unit);

        $this->assertEquals($expected, $converted->amount());
    }

    public function test_it_formats_amount(): void
    {
        $gram = new Ounce(126);

        $this->assertEquals('126oz', $gram->formatted());
        $this->assertEquals('126 ounces', $gram->formatted('%s ounces'));
    }

    public function conversionTestCases(): \Generator
    {
        yield 'to grams' => [25, 708.7373136020865, Gram::class];
        yield 'to kilograms' => [169, 4.791064239950105, Kilogram::class];
        yield 'to milligrams' => [2.5, 70873.73136020865 , Milligram::class];
        yield 'to pounds' => [400, 24.99971650507456, Pound::class];
        yield 'to stones' => [583, 2.6026254465045073, Stone::class];
        yield 'to tonnes' => [1863, 0.05281510460962749, Ton::class];
    }
}
