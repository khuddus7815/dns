<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Reports
                            <small>DNS Store Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/') ?>"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">Reports</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Sales Last 30 Days</h5>
                    </div>
                    <div class="card-body">
                        <div id="sales-bar-chart"></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Top 5 Selling Products (by Quantity)</h5>
                    </div>
                    <div class="card-body">
                        <div id="products-pie-chart"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

<script>
document.addEventListener("DOMContentLoaded", function() {

    // --- 1. Sales Bar Chart ---

    // Get the data from PHP
    var salesData = <?php echo $sales_chart_data ?? '[]'; ?>;

    // Format data for ApexCharts
    var formattedSalesData = salesData.map(function(item) {
        return {
            x: item.date,
            y: item.total
        };
    });

    var barChartOptions = {
        series: [{
            name: 'Sales',
            data: formattedSalesData
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
                horizontal: false,
                columnWidth: '55%',
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            type: 'datetime',
            title: {
                text: 'Date'
            }
        },
        yaxis: {
            title: {
                text: '$ (Amount)'
            }
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return "$ " + val
                }
            },
            x: {
                format: 'dd MMM yyyy'
            }
        }
    };

    var barChart = new ApexCharts(document.querySelector("#sales-bar-chart"), barChartOptions);
    barChart.render();


    // --- 2. Top Products Pie Chart ---

    // Get data from PHP
    var pieLabels = <?php echo $product_chart_labels ?? '[]'; ?>;
    var pieSeries = <?php echo $product_chart_series ?? '[]'; ?>;

    var pieChartOptions = {
        series: pieSeries,
        labels: pieLabels,
        chart: {
            type: 'pie',
            height: 350
        },
        legend: {
            position: 'bottom'
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var pieChart = new ApexCharts(document.querySelector("#products-pie-chart"), pieChartOptions);
    pieChart.render();

});
</script>