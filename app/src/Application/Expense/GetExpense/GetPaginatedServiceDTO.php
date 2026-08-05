<?php

namespace App\src\Application\Expense\GetExpense;

class GetPaginatedExpenseDTO
{
    public function __construct(
        public readonly array $expenses,
        public readonly int $page,
        public readonly int $perPage,
        public readonly int $total
    )
    {}
}