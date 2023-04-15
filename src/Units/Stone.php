<?php

namespace JacobFitzp\WeightConversions\Units;

class Stone extends AbstractUnit
{
    public const RELATIVE_TO_KG = 0.15747;

    /**
     * Get formatted version which can be displayed to user
     * For example "12st 6"
     *
     * @param string $format
     * @return string
     */
    public function formatted(string $format = '%sst %s'): string
    {
        $stones = floor($this->amount());
        $pounds = (new self($this->amount - $stones))
            ->to(Pound::class)
            ->round(0)
            ->amount();

        return sprintf($format, $stones, $pounds);
    }
}
