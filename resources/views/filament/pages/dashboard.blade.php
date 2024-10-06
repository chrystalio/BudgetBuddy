<x-filament::page>
    <!-- Welcome Card -->
    <div class="bg-white shadow rounded-lg p-6 mb-6 flex flex-col md:flex-row items-center justify-between">
        <!-- Left side: Welcome message -->
        <div class="text-left">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Welcome back, {{ auth()->user()->name }}!</h2>
            <p class="text-gray-500 mb-1">Today is {{ \Carbon\Carbon::now()->format('l, F j, Y') }}.</p>
            <p class="text-sm text-gray-600">You have <span class="font-medium">{{ $transactionCount }}</span> transactions recorded this month.</p>
        </div>

        <!-- Right side: Icon/Emoji -->
        <div class="mt-4 md:mt-0 md:ml-4 flex justify-center items-center bg-blue-50 rounded-full w-20 h-20">
            <span class="text-3xl">👋</span>
        </div>
    </div>


    <!-- 2-column layout for charts -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Income vs Expense Chart Card -->
        <div class="bg-white shadow rounded-lg p-6">
            <!-- Card Header -->
            <div class="card-header flex border-b items-center justify-between mb-4">
                <h2 class="text-lg font-bold text-gray-800">Income vs Expense</h2>
            </div>

            <!-- Card Body -->
            @if ($income == 0 && $expense == 0)
                <div class="flex flex-col items-center justify-center h-40 py-4">
                    <p class="text-gray-500 text-sm">No data available for this month.</p>
                </div>
            @else
                <div id="income-expense-chart" class="h-64"></div>
            @endif
        </div>


    </div>

    <!-- Include ApexCharts CDN -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- Include the compiled chart.js file -->
    @vite('resources/js/chart.js')

    <!-- Inline Script to Pass Dynamic Data to chart.js -->
    @if ($income != 0 || $expense != 0)
        <script>
            window.income = {{ $income }};
            window.expense = {{ $expense }};
        </script>
    @endif
</x-filament::page>
