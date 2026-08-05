<?php

namespace App\src\Application\Service\CreateService;

class CreateServiceDTO
{
    public function __construct(
        public readonly string $name,
        public readonly float $price
    )
    {}
}