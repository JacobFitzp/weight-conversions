<?php

namespace JacobFitzp\WeightConversions\Units;

class Ton extends AbstractUnit
{
    public const RELATIVE_TO_KG = 0.001;

    public function formatted(string $format = '%sT'): string
    {
        return sprintf($format, $this->amount());
    }
}
