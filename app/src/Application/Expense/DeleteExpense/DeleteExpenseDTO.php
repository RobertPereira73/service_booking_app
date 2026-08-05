<?php

namespace App\src\Application\Expense\DeleteExpense;

class DeleteExpenseDTO
{
    public function __construct(
        public readonly int $id
    )
    {}
}