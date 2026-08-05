<?php

namespace App\src\Domain\Service;

use App\src\Domain\ID;

interface ServiceRepository
{
    public function save(Service $service): void;
    
    public function find(ID $id): ?Service;

    public function findAll(): array;

    public function getPaginated(int $page, int $perPage): array;

    public function delete(ID $id): void;

    public function update(ID $id, Service $service): void;
}