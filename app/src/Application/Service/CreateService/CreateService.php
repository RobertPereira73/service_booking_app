<?php

namespace App\src\Application\Service\CreateService;

use App\src\Domain\ID;
use App\src\Domain\Name;
use App\src\Domain\Price;
use App\src\Domain\Service\Service;
use App\src\Domain\Service\ServiceRepository;

class CreateService
{
    public function __construct(private ServiceRepository $serviceRepository)
    {}

    public function execute(CreateServiceDTO $data): void
    {
        $service = new Service(
            name: new Name($data->name),
            price: new Price($data->price)
        );

        $this->serviceRepository->save($service);
    }
}