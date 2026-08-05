<?php

namespace App\src\Application\Service\UpdateService;

use App\src\Domain\ID;
use App\src\Domain\Name;
use App\src\Domain\Price;
use App\src\Domain\Service\Service;
use App\src\Domain\Service\ServiceRepository;

class UpdateService
{
    public function __construct(private ServiceRepository $serviceRepository)
    {}

    public function execute(UpdateServiceDTO $data): void
    {
        $id = new ID($data->id);

        $service = new Service(
            name: new Name($data->name),
            price: new Price($data->price)
        )
        ->setId($id);

        $this->serviceRepository->update($id, $service);
    }
}