<?php

namespace App\src\Domain\Client;

use App\src\Domain\Name;
use App\src\Domain\Client\Phone;

class Client
{
    /**
     * Create a new class instance.
     * 
     * @param Name $name
     * @param Phone $phone
     * 
     */
    public function __construct(
        private Name $name,
        private Phone $phone
    )
    {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }
}
