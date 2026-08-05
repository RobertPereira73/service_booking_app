<?php

namespace App\src\Application\Client\DeleteClient;

class DeleteClientDTO
{
    public function __construct(
        public readonly string $phone
    )
    {}
}