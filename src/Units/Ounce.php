<?php

namespace JacobFitzp\WeightConversions\Units;

class Ounce extends AbstractUnit
{
    public const RELATIVE_TO_KG = 35.274;

    public function formatted(string $format = '%soz'): string
    {
        return sprintf($format, $this->amount());
    }
}
