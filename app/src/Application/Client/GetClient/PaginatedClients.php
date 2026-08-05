<?php

namespace App\src\Application\Client\GetClient;

use App\src\Domain\Client\ClientRepository;

class PaginatedClients
{
    public function __construct(private ClientRepository $clientRepository)
    {}

    public function execute(PaginatedClientsDTO $data): array
    {
        return $this->clientRepository->getPaginated($data->page, $data->perPage);
    }
}