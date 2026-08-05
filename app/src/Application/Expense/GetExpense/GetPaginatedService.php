<?php

namespace App\src\Application\Expense\GetExpense;

use App\src\Domain\Expense\ExpenseRepository;

class GetPaginatedExpense
{
    public function __construct(private ExpenseRepository $expenseRepository)
    {}

    public function execute(GetPaginatedExpenseDTO $data): array
    {
        return $this->expenseRepository->getPaginated($data->page, $data->perPage);
    }
}