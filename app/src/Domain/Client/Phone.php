<?php

namespace App\src\Domain\Client;

use Stringable;

class Phone implements Stringable
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
        if (!is_numeric($value)) {
            throw new \DomainException("Telefone deve conter um valor numérico!");
        }

        if (strlen($value) < 11) {
            throw new \DomainException("Telefone deve conter no mínimo 11 caractéres!");
        }

        $this->value = $value;
    }
}
