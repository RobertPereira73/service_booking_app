<?php

namespace App\src\Application\Expense\DeleteExpense;

use App\src\Domain\Expense\ExpenseRepository;
use App\src\Domain\ID;

class DeleteExpense
{
    public function __construct(private ExpenseRepository $expenseRepository)
    {}

    public function execute(DeleteExpenseDTO $data): void
    {
        $id = new ID($data->id);
        $this->expenseRepository->delete($id);
    }
}