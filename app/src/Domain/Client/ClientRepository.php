<?php

namespace App\src\Domain\Client;

use App\src\Domain\Name;

interface ClientRepository
{
    public function save(Client $client): void;
    
    public function find(Phone $phone): ?Client;

    public function findAll(): array;

    public function getPaginated(int $page, int $perPage): array;

    public function delete(Phone $phone): void;

    public function update(Phone $phone, Name $name): void;
}