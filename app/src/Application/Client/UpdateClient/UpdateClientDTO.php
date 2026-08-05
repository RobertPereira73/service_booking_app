<?php

namespace App\src\Application\Client\UpdateClient;

class UpdateClientDTO
{
    public function __construct(
        public readonly string $phone,
        public readonly string $name,
    )
    {}
}