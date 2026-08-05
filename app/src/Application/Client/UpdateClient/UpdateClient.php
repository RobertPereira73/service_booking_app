<?php

namespace App\src\Application\Client\CreateClient;

use App\src\Application\Client\UpdateClient\UpdateClientDTO;
use App\src\Domain\Client\Client;
use App\src\Domain\Client\ClientRepository;
use App\src\Domain\Client\Phone;
use App\src\Domain\Name;

class UpdateClient
{
    public function __construct(private ClientRepository $clientRepository)
    {}

    public function execute(UpdateClientDTO $data): void
    {
        $phone = new Phone($data->phone);
        $name = new Name($data->name);
        
        $this->clientRepository->update($phone, $name);
    }
}