<?php

namespace App\src\Application\Expense\CreateExpense;

class CreateExpenseDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $price,
        public readonly bool $appellant
    )
    {}
}