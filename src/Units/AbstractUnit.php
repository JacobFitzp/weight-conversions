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
    public float|int $amountInKilograms = 0;
    protected false|int $roundingPrecision = false;

    public function __construct(protected int|float $amount = 0)
    {
        $this->calculateAmountInKilograms();
    }

    /**
     * Get weight amount for this unit
     *
     * @return int|float
     */
    public function amount(): int|float
    {
        // With rounding
        if (is_int($this->roundingPrecision)) {
            return round(
                $this->amount,
                $this->roundingPrecision
            );
        }

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
     * Round the amount
     *
     * @param false|int $precision
     * @return $this
     */
    public function round(false|int $precision = 1): AbstractUnit
    {
        $this->roundingPrecision = $precision;

        return $this;
    }

    /**
     * Get a formatted human-readable version of the amount
     * For example "23KG", "12st 5"
     *
     * @param string $format
     * @return string
     */
    abstract public function formatted(string $format = ''): string;

    /**
     * Calculate the amount in kilograms.
     * This is used as the basis for all conversions
     *
     * @return void
     */
    protected function calculateAmountInKilograms(): void
    {
        $this->amountInKilograms = $this->amount() / $this::RELATIVE_TO_KG;
    }
}
