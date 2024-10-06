<?php

namespace App\Filament\Pages;

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
    }
}
