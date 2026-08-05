<?php

namespace App\src\Application\Service\UpdateService;

class UpdateServiceDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $price
    )
    {}
}