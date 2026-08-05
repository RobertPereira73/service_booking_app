<?php

namespace App\src\Domain;

use Stringable;

class Name implements Stringable
{
    private string $value;

    /**
     * Create a new class instance.
     */
    public function __construct(
        string $value
    )
    {
        $this->setValue($value);
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function setValue(string $value): void
    {
        if (strlen($value) < 4) {
            throw new \DomainException("Nome deve conter no mínimo 4 caractéres!");
        }

        $this->value = strtoupper($value);
    }
}
