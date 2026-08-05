<?php

namespace App\src\Infrastructure\Client;

use App\src\Domain\Client\Client;
use App\src\Domain\Client\ClientRepository;
use App\src\Domain\Client\Phone;
use App\src\Domain\Name;
use App\Models\Client\ClientModel;

class ClientRepositoryPgSql implements ClientRepository
{
    public function save(Client $client): void
    {
        ClientModel::create([
            'name' => $client->getName(),
            'phone' => $client->getPhone(),
        ]);
    }

    public function find(Phone $phone): ?Client
    {
        $clientModel = ClientModel::query()
        ->where('clients.phone', $phone)
        ->first();

        if (!$clientModel) {
            return null;
        }

        return new Client(
            new Name($clientModel->name),
            new Phone($clientModel->phone)
        );

    }

    public function getPaginated(int $page, int $perPage): array
    {
        $paginatedClients = ClientModel::query()->paginate($perPage, page: $page);

        $clients = array_map(function ($clientModel) {
            return new Client(
                new Name($clientModel->name),
                new Phone($clientModel->phone)
            );
        }, $paginatedClients->items());

        return [
            'clients' => $clients,
            'page' => $paginatedClients->currentPage(),
            'perPage' => $paginatedClients->perPage(),
            'total' => $paginatedClients->total()
        ];
    }

    public function findAll(): array
    {
        return ClientModel::all()
        ->map(function ($clientModel) {
            return new Client(
                new Name($clientModel->name),
                new Phone($clientModel->phone)
            );
        })
        ->toArray();
    }

    public function delete(Phone $phone): void
    {
        ClientModel::query()
        ->where('clients.phone', $phone)
        ->delete();
    }

    public function update(Phone $phone, Name $name): void
    {
        ClientModel::query()
        ->where('clients.phone', $phone)
        ->update(['name' => $name]);
    }
}