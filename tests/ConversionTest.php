<?php

namespace JacobFitzp\WeightConversions\Tests;

use JacobFitzp\WeightConversions\Units\Gram;
use JacobFitzp\WeightConversions\Units\Kilogram;
use JacobFitzp\WeightConversions\Units\Milligram;
use JacobFitzp\WeightConversions\Units\Ounce;
use JacobFitzp\WeightConversions\Units\Pound;
use JacobFitzp\WeightConversions\Units\Stone;
use JacobFitzp\WeightConversions\Units\Ton;
use PHPUnit\Framework\TestCase;

class ConversionTest extends TestCase
{
    public function test_it_can_create_unit(): void
    {
        $pound = new Pound(2.3);
        $this->assertEquals(2.3, $pound->getAmount());
    }

    public function test_it_can_set_amount(): void
    {
        $pound = new Pound(2.3);
        $pound->setAmount(7.3);

        $this->assertEquals(7.3, $pound->getAmount());
    }

    /**
     * @dataProvider conversionTestCases
     */
    public function test_it_can_convert(\Closure $from, string $to, float $expected): void
    {
        $converted = $from()->to($to);

        $this->assertInstanceOf($to, $converted);
        $this->assertEquals($expected, $converted->getAmount());
    }

    public function conversionTestCases(): \Generator
    {
        yield 'Kilogram to Gram' => [
            fn () => new Kilogram(5),
            Gram::class,
            5000,
        ];

        yield 'Kilogram to Milligram' => [
            fn () => new Kilogram(6.23),
            Milligram::class,
            6230000,
        ];

        yield 'Kilogram to Ounce' => [
            fn () => new Kilogram(4.35),
            Ounce::class,
            153.4419,
        ];

        yield 'Kilogram to Pound' => [
            fn () => new Kilogram(2.87),
            Pound::class,
            6.327202000000001,
        ];

        yield 'Kilogram to Stone' => [
            fn () => new Kilogram(12.3),
            Stone::class,
            1.936881,
        ];

        yield 'Kilogram to Ton' => [
            fn () => new Kilogram(1267),
            Ton::class,
            1.2670000000000001,
        ];
    }
}
