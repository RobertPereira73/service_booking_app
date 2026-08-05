<?php

namespace App\src\Application\Expense\CreateExpense;

use App\src\Domain\Expense\Expense;
use App\src\Domain\Expense\ExpenseRepository;
use App\src\Domain\Name;
use App\src\Domain\Price;

class CreateExpense
{
    public function __construct(private ExpenseRepository $expenseRepository)
    {}

    public function execute(CreateExpenseDTO $data): void
    {
        $expense = new Expense(
            name: new Name($data->name),
            price: new Price($data->price),
            appellant: $data->appellant
        );

        $this->expenseRepository->save($expense);
    }
}