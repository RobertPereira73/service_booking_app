<?php

namespace App\src\Application\Service\DeleteService;

use App\src\Domain\ID;
use App\src\Domain\Service\ServiceRepository;

class DeleteService
{
    public function __construct(private ServiceRepository $serviceRepository)
    {}

    public function execute(DeleteServiceDTO $data): void
    {
        $id = new ID($data->id);
        $this->serviceRepository->delete($id);
    }
}