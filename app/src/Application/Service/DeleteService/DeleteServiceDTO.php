<?php

namespace App\src\Application\Service\DeleteService;

class DeleteServiceDTO
{
    public function __construct(
        public readonly int $id,
    )
    {}
}