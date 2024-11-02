// Income vs Expense Pie Chart
let incomeExpenseOptions = {
    series: [window.income, window.expense], // Data for Income and Expense
    chart: {
        type: 'pie',
        height: 200
    },
    labels: ['Income', 'Expense'], // Labels for the pie chart
    responsive: [{
        breakpoint: 480,
        options: {
            chart: {
                width: 300
            },
            legend: {
                position: 'bottom'
            }
        }
    }],
    colors: ['#1E3E62', '#C7253E'], // Custom colors for the chart
    dataLabels: {
        enabled: false // Disable the values from showing on the pie chart itself
    },
    tooltip: {
        y: {
            formatter: function(val) {
                return new Intl.NumberFormat('en-US', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(val);
            }
        }
    }
};

let incomeExpenseChart = new ApexCharts(document.querySelector("#income-expense-chart"), incomeExpenseOptions);
incomeExpenseChart.render();

// Category Breakdown Bar Chart
let categoryBreakdownOptions = {
    series: [{
        name: 'Expenses',
        data: window.categoryExpenses // This is dynamic data for each category
    }],
    chart: {
        type: 'bar',
        height: 350,
        toolbar: {
            show: false
        }
    },
    plotOptions: {
        bar: {
            borderRadius: 4,
            horizontal: true,
        }
    },
    dataLabels: {
        enabled: false
    },
    xaxis: {
        categories: window.categoryNames, // Dynamic categories
        labels: {
            formatter: function (val) {
                return new Intl.NumberFormat('en-US').format(val); // Thousands separator
            }
        }
    },
    tooltip: {
        y: {
            formatter: function (val) {
                return new Intl.NumberFormat('en-US', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(val);
            }
        }
    },
    colors: ['#C68FE6'],
};

let categoryBreakdownChart = new ApexCharts(document.querySelector("#category-breakdown-chart"), categoryBreakdownOptions);
categoryBreakdownChart.render();
