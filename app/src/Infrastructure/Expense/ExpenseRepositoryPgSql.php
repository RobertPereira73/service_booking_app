<?php

namespace App\src\Infrastructure\Expense;

use App\src\Domain\Name;
use App\Models\Expense\ExpenseModel;
use App\src\Domain\Expense\Expense;
use App\src\Domain\Expense\ExpenseRepository;
use App\src\Domain\ID;
use App\src\Domain\Price;

class ExpenseRepositoryPgSql implements ExpenseRepository
{
    public function save(Expense $expense): void
    {
        ExpenseModel::create([
            'name' => $expense->getName(),
            'price' => $expense->getPrice(),
            'appellant' => $expense->getAppellant(),
        ]);
    }

    public function find(ID $id): ?Expense
    {
        $expenseModel = ExpenseModel::query()
        ->where('expenses.id', $id)
        ->first();

        if (!$expenseModel) {
            return null;
        }

        return new Expense(
            new Name($expenseModel->name),
            new Price($expenseModel->price),
            $expenseModel->appellant
        );
    }

    public function getPaginated(int $page, int $perPage): array
    {
        $paginatedExpenses = ExpenseModel::query()->paginate($perPage, page: $page);

        $expenses = array_map(function ($expenseModel) {
            return new Expense(
                new Name($expenseModel->name),
                new Price($expenseModel->price),
                $expenseModel->appellant
            );
        }, $paginatedExpenses->items());

        return [
            'expenses' => $expenses,
            'page' => $paginatedExpenses->currentPage(),
            'perPage' => $paginatedExpenses->perPage(),
            'total' => $paginatedExpenses->total()
        ];
    }

    public function findAll(): array
    {
        return ExpenseModel::all()
        ->map(function ($expenseModel) {
            return new Expense(
                new Name($expenseModel->name),
                new Price($expenseModel->price),
                $expenseModel->appellant
            );
        })
        ->toArray();
    }

    public function delete(ID $id): void
    {
        ExpenseModel::query()
        ->where('expenses.id', $id)
        ->delete();
    }

    public function update(ID $id, Expense $expense): void
    {
        ExpenseModel::query()
        ->where('expenses.id', $id)
        ->update([
            'name' => $expense->getName(),
            'price' => $expense->getPrice(),
            'appellant' => $expense->getAppellant()
        ]);
    }
}