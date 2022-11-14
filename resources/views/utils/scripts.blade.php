<script type="text/javascript">
    $(window).on('load', function() {
        'use strict';
        var $barColor = '#f3f3f3';
        var $trackBgColor = '#EBEBEB';
        var $textMutedColor = '#b9b9c3';
        var $budgetStrokeColor2 = '#dcdae3';
        var $goalStrokeColor2 = '#51e5a8';
        var $strokeColor = '#ebe9f1';
        var $textHeadingColor = '#5e5873';
        var $earningsStrokeColor2 = '#28c76f66';
        var $earningsStrokeColor3 = '#28c76f33';

        var $statisticsOrderChart = document.querySelector('#statistics-order-chart');
        var $statisticsProfitChart = document.querySelector('#statistics-profit-chart');
        var $earningsChart = document.querySelector('#earnings-chart');
        var $revenueReportChart = document.querySelector('#revenue-report-chart');
        var $budgetChart = document.querySelector('#budget-chart');
        var $browserStateChartPrimary = document.querySelector('#browser-state-chart-primary');
        var $browserStateChartWarning = document.querySelector('#browser-state-chart-warning');
        var $browserStateChartSecondary = document.querySelector('#browser-state-chart-secondary');
        var $browserStateChartInfo = document.querySelector('#browser-state-chart-info');
        var $browserStateChartDanger = document.querySelector('#browser-state-chart-danger');
        var $goalOverviewChart = document.querySelector('#goal-overview-radial-bar-chart');

        var statisticsOrderChartOptions;
        var statisticsProfitChartOptions;
        var earningsChartOptions;
        var revenueReportChartOptions;
        var budgetChartOptions;
        var browserStatePrimaryChartOptions;
        var browserStateWarningChartOptions;
        var browserStateSecondaryChartOptions;
        var browserStateInfoChartOptions;
        var browserStateDangerChartOptions;
        var goalOverviewChartOptions;

        var statisticsOrderChart;
        var statisticsProfitChart;
        var earningsChart;
        var revenueReportChart;
        var budgetChart;
        var browserStatePrimaryChart;
        var browserStateDangerChart;
        var browserStateInfoChart;
        var browserStateSecondaryChart;
        var browserStateWarningChart;
        var goalOverviewChart;

        earningsChartOptions = {
            chart: {
                type: 'donut',
                height: 120,
                toolbar: {
                    show: false
                }
            },
            dataLabels: {
                enabled: false
            },
            series: [<?= $data['per_income'] ?>, <?= $data['per_expense'] ?>, <?= $data['per_tax'] ?>],
            legend: {
                show: false
            },
            comparedResult: [2, -3, 8],
            labels: ['Income', 'Expenses', 'Tax'],
            stroke: {
                width: 0
            },
            colors: [$earningsStrokeColor2, $earningsStrokeColor3, window.colors.solid.success],
            grid: {
                padding: {
                    right: -20,
                    bottom: -8,
                    left: -20
                }
            },
            plotOptions: {
                pie: {
                    startAngle: -10,
                    donut: {
                        labels: {
                            show: true,
                            name: {
                                offsetY: 15
                            },
                            value: {
                                offsetY: -15,
                                formatter: function(val) {
                                    return parseInt(val) + '%';
                                }
                            },
                            total: {
                                show: true,
                                offsetY: 15,
                                label: 'Income',
                                formatter: function(w) {
                                    return '<?= $data['per_income'] ?>';
                                }
                            }
                        }
                    }
                }
            },
            responsive: [{
                    breakpoint: 1325,
                    options: {
                        chart: {
                            height: 100
                        }
                    }
                },
                {
                    breakpoint: 1200,
                    options: {
                        chart: {
                            height: 120
                        }
                    }
                },
                {
                    breakpoint: 1045,
                    options: {
                        chart: {
                            height: 100
                        }
                    }
                },
                {
                    breakpoint: 992,
                    options: {
                        chart: {
                            height: 120
                        }
                    }
                }
            ]
        };
        earningsChart = new ApexCharts($earningsChart, earningsChartOptions);
        earningsChart.render();


        ////Revenue report chat

        revenueReportChartOptions = {
            chart: {
                height: 230,
                stacked: true,
                type: 'bar',
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    columnWidth: '17%',
                    endingShape: 'rounded'
                },
                distributed: true
            },
            colors: [window.colors.solid.primary, window.colors.solid.warning],
            series: [{
                    name: 'Earning',
                    data: [<?=$data['chat_incomes']?>]
                },
                {
                    name: 'Expense',
                    data: [-<?=$data['chat_expenses']?>]
                }
            ],
            dataLabels: {
                enabled: false
            },
            legend: {
                show: false
            },
            grid: {
                padding: {
                    top: -20,
                    bottom: -10
                },
                yaxis: {
                    lines: {
                        show: false
                    }
                }
            },
            xaxis: {
                categories: [<?=$data['chat_months']?>],
                labels: {
                    style: {
                        colors: $textMutedColor,
                        fontSize: '0.86rem'
                    }
                },
                axisTicks: {
                    show: false
                },
                axisBorder: {
                    show: false
                }
            },
            yaxis: {
                labels: {
                    style: {
                        colors: $textMutedColor,
                        fontSize: '0.86rem'
                    }
                }
            }
        };
        revenueReportChart = new ApexCharts($revenueReportChart, revenueReportChartOptions);
        revenueReportChart.render();

    });
</script>
