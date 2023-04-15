<?php

namespace JacobFitzp\WeightConversions\Units;

class Gram extends AbstractUnit
{
    public const RELATIVE_TO_KG = 1000;

    public function formatted(string $format = '%sg'): string
    {
        return sprintf($format, $this->amount());
    }
}
