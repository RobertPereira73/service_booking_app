<?php

namespace App\src\Domain\Service;

use App\src\Domain\ID;
use App\src\Domain\Name;
use App\src\Domain\Price;

class Service
{
    private ?ID $id;

    public function __construct(
        private Name $name,
        private Price $price
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

    public function setId(ID $id): self
    {
        $this->id = $id;
        return $this;
    }
}