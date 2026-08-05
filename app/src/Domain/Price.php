<?php

namespace App\src\Domain;

use Stringable;

class Price implements Stringable
{
    private float $value;

    /**
     * Create a new class instance.
     */
    public function __construct(
        float $value
    )
    {
        $this->setValue($value);
    }

    public function __toString(): string
    {
        return (string) $this->value;
    }

    public function setValue(float $value): void
    {
        if (!is_numeric($value)) {
            throw new \DomainException("Valor deve ser um número!");
        }

        if ($value < 0) {
            throw new \DomainException("Valor deve ser um número positivo!");
        }

        $this->value = $value;
    }
}
