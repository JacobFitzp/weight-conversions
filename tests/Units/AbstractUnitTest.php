<?php

namespace JacobFitzp\WeightConversions\Tests\Units;

use JacobFitzp\WeightConversions\Units\AbstractUnit;
use JacobFitzp\WeightConversions\Units\Kilogram;
use PHPUnit\Framework\TestCase;

class AbstractUnitTest extends TestCase
{
    public function test_it_can_get_amount(): void
    {
        $hobnobs = new Hobnob(25);

        $this->assertEquals(25, $hobnobs->amount());
    }

    public function test_it_can_set_amount(): void
    {
        $hobnobs = new Hobnob(25);
        $hobnobs->setAmount(50);

        $this->assertEquals(50, $hobnobs->amount());
    }

    public function test_it_can_convert_to_kg(): void
    {
        $kg = (new Hobnob(75))
            ->to(Kilogram::class);

        $this->assertInstanceOf(Kilogram::class, $kg);
        $this->assertEquals(1.5, $kg->amount());
    }

    public function test_it_can_convert_from_kg(): void
    {
        $hobnobs = (new Kilogram(2))
            ->to(Hobnob::class);

        $this->assertInstanceOf(Hobnob::class, $hobnobs);
        $this->assertEquals(100, $hobnobs->amount());
    }

    public function test_it_can_format_amount(): void
    {
        $hobnobs = new Hobnob(25);

        $this->assertEquals('25 hobnobs', $hobnobs->formatted());
    }

    public function test_it_can_round_amount(): void
    {
        $hobnobs = new Hobnob(25.1234);

        $this->assertEquals(25.1, $hobnobs->round()->amount());
        $this->assertEquals(25.12, $hobnobs->round(2)->amount());
        $this->assertEquals(25.123, $hobnobs->round(3)->amount());
        $this->assertEquals(25.1234, $hobnobs->round(4)->amount());
    }
}

class Hobnob extends AbstractUnit
{
    public const RELATIVE_TO_KG = 50;

    public function formatted(string $format = '%s hobnobs'): string
    {
        return sprintf($format, $this->amount());
    }
}
