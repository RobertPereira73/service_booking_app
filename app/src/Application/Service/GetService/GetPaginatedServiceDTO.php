<?php

namespace App\src\Application\Service\GetService;

class GetPaginatedServiceDTO
{
    public function __construct(
        public readonly array $services,
        public readonly int $page,
        public readonly int $perPage,
        public readonly int $total
    )
    {}
}