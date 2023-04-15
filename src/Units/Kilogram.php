<?php

namespace JacobFitzp\WeightConversions\Units;

class Kilogram extends AbstractUnit
{
    public const RELATIVE_TO_KG = 1;

    public function formatted(string $format = '%skg'): string
    {
        return sprintf($format, $this->amount());
    }
}
