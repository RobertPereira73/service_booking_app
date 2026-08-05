<?php

namespace App\src\Application\Client\CreateClient;

class CreateClientDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $phone
    )
    {}
}