<?php

namespace App\Filament\Pages;

use App\Models\Category;
use App\Models\Transaction;
use Filament\Pages\Page;
use Carbon\Carbon;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.pages.dashboard';

    public int $income = 0;
    public int $expense = 0;
    public int $transactionCount = 0; // Variable for total transactions
    public array $categoryExpenses = []; // Declare this property
    public array $categoryNames = [];

    public function mount()
    {
        // Get the current month
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        // Calculate total income and expense for the current month
        $this->income = Transaction::where('type', 'Income')
            ->whereBetween('date', [$startOfMonth, $endOfMonth])
            ->sum('amount');

        $this->expense = Transaction::where('type', 'Expense')
            ->whereBetween('date', [$startOfMonth, $endOfMonth])
            ->sum('amount');

        // Count total transactions for the current month
        $this->transactionCount = Transaction::whereBetween('date', [$startOfMonth, $endOfMonth])->count();

        // Get category-wise expense breakdown (for Expense categories only)
        $categories = Category::where('type', 'Expense')
            ->with(['transactions' => function ($query) use ($startOfMonth, $endOfMonth) {
                $query->where('type', 'Expense')->whereBetween('date', [$startOfMonth, $endOfMonth]);
            }])
            ->get();

        foreach ($categories as $category) {
            $totalExpense = $category->transactions()
                ->where('type', 'Expense')
                ->whereBetween('date', [$startOfMonth, $endOfMonth])
                ->sum('amount');

            // Only include categories with expenses
            if ($totalExpense > 0) {
                $this->categoryExpenses[] = $totalExpense;
                $this->categoryNames[] = $category->name;
            }
        }

    }
}
