<?php

namespace App\src\Domain\Expense;

use App\src\Domain\ID;

interface ExpenseRepository
{
    public function save(Expense $expense): void;
    
    public function find(ID $id): ?Expense;

    public function findAll(): array;

    public function getPaginated(int $page, int $perPage): array;

    public function delete(ID $id): void;

    public function update(ID $id, Expense $expense): void;
}