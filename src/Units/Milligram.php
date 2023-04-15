<?php

namespace JacobFitzp\WeightConversions\Units;

class Milligram extends AbstractUnit
{
    public const RELATIVE_TO_KG = 1000000;

    public function formatted(string $format = '%smg'): string
    {
        return sprintf($format, $this->amount());
    }
}
