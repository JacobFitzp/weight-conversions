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

class StoneTest extends TestCase
{
    public function test_it_has_correct_relative_to_kg_set(): void
    {
        $this->assertEquals(0.15747, Stone::RELATIVE_TO_KG);
    }

    /**
     * @dataProvider conversionTestCases
     */
    public function test_it_converts(float $stones, float $expected, string $unit): void
    {
        $converted = (new Stone($stones))
            ->to($unit);

        $this->assertEquals($expected, $converted->amount());
    }

    public function test_it_formats_amount(): void
    {
        $gram = new Stone(13.6);

        $this->assertEquals('13st 8', $gram->formatted());
        $this->assertEquals('13 stone 8 pounds', $gram->formatted('%s stone %s pounds'));
    }

    public function conversionTestCases(): \Generator
    {
        yield 'to grams' => [2.5, 15876.039880612181, Gram::class];
        yield 'to kilograms' => [32, 203.2133104718359, Kilogram::class];
        yield 'to milligrams' => [0.24, 1524099.8285387692, Milligram::class];
        yield 'to ounces' => [2, 448.00914459897126, Ounce::class];
        yield 'to pounds' => [53, 742.0067314409094, Pound::class];
        yield 'to tonnes' => [121, 0.7684003302216295, Ton::class];
    }
}
