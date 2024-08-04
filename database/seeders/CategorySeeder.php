<?php

namespace Database\Seeders;

use App\CategoryType;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            // Expense Categories
            ['name' => 'Groceries', 'type' => CategoryType::EXPENSE->value],
            ['name' => 'Utilities', 'type' => CategoryType::EXPENSE->value],
            ['name' => 'Rent/Mortgage', 'type' => CategoryType::EXPENSE->value],
            ['name' => 'Transportation', 'type' => CategoryType::EXPENSE->value],
            ['name' => 'Insurance', 'type' => CategoryType::EXPENSE->value],
            ['name' => 'Medical/Healthcare', 'type' => CategoryType::EXPENSE->value],
            ['name' => 'Dining Out', 'type' => CategoryType::EXPENSE->value],
            ['name' => 'Entertainment', 'type' => CategoryType::EXPENSE->value],
            ['name' => 'Travel', 'type' => CategoryType::EXPENSE->value],
            ['name' => 'Education', 'type' => CategoryType::EXPENSE->value],
            ['name' => 'Personal Care', 'type' => CategoryType::EXPENSE->value],
            ['name' => 'Clothing', 'type' => CategoryType::EXPENSE->value],
            ['name' => 'Subscriptions', 'type' => CategoryType::EXPENSE->value],
            ['name' => 'Household Supplies', 'type' => CategoryType::EXPENSE->value],
            ['name' => 'Gifts/Donations', 'type' => CategoryType::EXPENSE->value],
            ['name' => 'Debt Payments', 'type' => CategoryType::EXPENSE->value],
            ['name' => 'Childcare', 'type' => CategoryType::EXPENSE->value],
            ['name' => 'Pet Care', 'type' => CategoryType::EXPENSE->value],
            ['name' => 'Miscellaneous', 'type' => CategoryType::EXPENSE->value],

            // Income Categories
            ['name' => 'Salary', 'type' => CategoryType::INCOME->value],
            ['name' => 'Freelance', 'type' => CategoryType::INCOME->value],
            ['name' => 'Investment', 'type' => CategoryType::INCOME->value],
            ['name' => 'Business', 'type' => CategoryType::INCOME->value],
            ['name' => 'Gifts', 'type' => CategoryType::INCOME->value],
            ['name' => 'Refunds/Reimbursements', 'type' => CategoryType::INCOME->value],
            ['name' => 'Government Benefits', 'type' => CategoryType::INCOME->value],
            ['name' => 'Bonus', 'type' => CategoryType::INCOME->value],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
