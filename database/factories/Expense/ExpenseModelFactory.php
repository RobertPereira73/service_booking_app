<?php

namespace Database\Factories\Expense;

use App\Models\Expense\ExpenseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ExpenseModel>
 */
class ExpenseModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2, 1, 100),
            'appellant' => $this->faker->boolean(),
        ];
    }
}
