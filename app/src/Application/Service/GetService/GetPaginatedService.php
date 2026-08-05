<?php

namespace App\src\Application\Service\GetService;

use App\src\Domain\Service\ServiceRepository;

class GetPaginatedService
{
    public function __construct(private ServiceRepository $serviceRepository)
    {}

    public function execute(GetPaginatedServiceDTO $data): array
    {
        return $this->serviceRepository->getPaginated($data->page, $data->perPage);
    }
}