<?php

namespace JacobFitzp\WeightConversions\Units;

class Pound extends AbstractUnit
{
    public const RELATIVE_TO_KG = 2.2046;

    public function formatted(string $format = '%slb'): string
    {
        return sprintf($format, $this->amount());
    }
}
