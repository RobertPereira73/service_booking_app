<?php

namespace App\src\Domain\Expense;

use App\src\Domain\ID;
use App\src\Domain\Name;
use App\src\Domain\Price;
use App\src\Domain\SetId;

class Expense
{
    private ?ID $id;

    public function __construct(
        private Name $name,
        private Price $price,
        private bool $appellant
    )
    {}

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function getAppellant(): bool
    {
        return $this->appellant;
    }

    public function setId(ID $id): self
    {
        $this->id = $id;
        return $this;
    }
}