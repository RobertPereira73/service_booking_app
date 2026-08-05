<?php

namespace App\src\Application\Client\GetClient;

class PaginatedClientsDTO
{
    public function __construct(
        public readonly array $clients,
        public readonly int $page,
        public readonly int $perPage,
        public readonly int $total
    )
    {}
}