<?php

namespace App\Models\Expense;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExpenseModel extends Model
{
    /** @use HasFactory<\Database\Factories\Expense\ExpenseModelFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'expenses';

    protected $fillable = [
        'name',
        'price',
        'appellant',
    ];
}
