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
