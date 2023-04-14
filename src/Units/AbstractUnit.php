<?php

namespace JacobFitzp\WeightConversions\Units;

/**
 * @author Jacob Fitzpatrick <contact@jacobfitzp.me>
 */
abstract class AbstractUnit
{
    /**
     * Amount relative to one kilogram
     */
    public const RELATIVE_TO_KG = 1;

    /**
     * Amount in kilograms
     * Used as a basis for all conversions
     *
     * @var float|int
     */
    protected float $amountInKilograms = 0;

    public function __construct(protected float $amount = 0)
    {
        $this->calculateAmountInKilograms();
    }

    /**
     * Get weight amount for this unit
     *
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * Set weight amount for this unit
     *
     * @param float $amount
     * @return $this
     */
    public function setAmount(float $amount): self
    {
        $this->amount = $amount;
        $this->calculateAmountInKilograms();

        return $this;
    }

    /**
     * Convert to another unit
     *
     * @param class-string<AbstractUnit> $unitType
     * @return AbstractUnit
     */
    public function to(string $unitType): AbstractUnit
    {
        // Convert the amount in kilograms to the new unit type
        return new $unitType($unitType::RELATIVE_TO_KG * $this->amountInKilograms);
    }

    /**
     * Calculate the amount in kilograms.
     * This is used as the basis for all conversions
     *
     * @return void
     */
    protected function calculateAmountInKilograms(): void
    {
        $this->amountInKilograms = self::RELATIVE_TO_KG * $this->amount;
    }
}
