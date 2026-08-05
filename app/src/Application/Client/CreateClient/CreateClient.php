<?php

namespace App\src\Application\Client\CreateClient;

use App\src\Domain\Client\Client;
use App\src\Domain\Client\ClientRepository;
use App\src\Domain\Client\Phone;
use App\src\Domain\Name;

class CreateClient
{
    public function __construct(private ClientRepository $clientRepository)
    {}

    public function execute(CreateClientDTO $data): void
    {
        $client = new Client(
            name: new Name($data->name),
            phone: new Phone($data->phone)
        );

        $this->clientRepository->save($client);
    }
}