<?php

namespace App\src\Application\Client\DeleteClient;

use App\src\Domain\Client\Client;
use App\src\Domain\Client\ClientRepository;
use App\src\Domain\Client\Phone;
use App\src\Domain\Name;

class DeleteClient
{
    public function __construct(private ClientRepository $clientRepository)
    {}

    public function execute(DeleteClientDTO $data): void
    {
        $phone = new Phone($data->phone);
        $this->clientRepository->delete($phone);
    }
}