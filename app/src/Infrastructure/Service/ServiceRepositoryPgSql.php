<?php

namespace App\src\Infrastructure\Service;

use App\src\Domain\Name;
use App\src\Domain\Service\ServiceRepository;
use App\Models\Service\ServiceModel;
use App\src\Domain\ID;
use App\src\Domain\Price;
use App\src\Domain\Service\Service;

class ServiceRepositoryPgSql implements ServiceRepository
{
    public function save(Service $service): void
    {
        $createdService = ServiceModel::create([
            'name' => $service->getName(),
            'price' => $service->getPrice(),
        ]);

        $service->setId(new ID($createdService->id));
    }

    public function find(ID $id): ?Service
    {
        $serviceModel = ServiceModel::query()
        ->where('services.id', $id)
        ->first();

        if (!$serviceModel) {
            return null;
        }

        return new Service(
            new Name($serviceModel->name),
            new Price($serviceModel->price)
        )
        ->setId(new ID($serviceModel->id));
    }

    public function getPaginated(int $page, int $perPage): array
    {
        $paginatedServices = ServiceModel::query()->paginate($perPage, page: $page);

        $services = array_map(function ($serviceModel) {
            return new Service(
                new Name($serviceModel->name),
                new Price($serviceModel->price)
            )
            ->setId(new ID($serviceModel->id));
        }, $paginatedServices->items());

        return [
            'services' => $services,
            'page' => $paginatedServices->currentPage(),
            'perPage' => $paginatedServices->perPage(),
            'total' => $paginatedServices->total()
        ];
    }

    public function findAll(): array
    {
        return ServiceModel::all()
        ->map(function ($serviceModel) {
            return new Service(
                new Name($serviceModel->name),
                new Price($serviceModel->price)
            )
            ->setId(new ID($serviceModel->id));
        })
        ->toArray();
    }

    public function delete(ID $id): void
    {
        ServiceModel::query()
        ->where('services.id', $id)
        ->delete();
    }

    public function update(ID $id, Service $service): void
    {
        ServiceModel::query()
        ->where('services.id', $id)
        ->update([
            'name' => $service->getName(),
            'price' => $service->getPrice()
        ]);
    }
}