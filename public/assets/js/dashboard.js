$(function() {
    /* ChartJS */
    "use strict";
    if ($("#mixed-chart").length) {
        var chartData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
            datasets: [
                {
                    type: "line",
                    label: "Revenue",
                    data: ["23", "33", "32", "65", "21", "45", "35"],
                    backgroundColor: ChartColor[2],
                    borderColor: ChartColor[2],
                    borderWidth: 3,
                    fill: false
                },
                {
                    type: "bar",
                    label: "Standard",
                    data: ["53", "28", "19", "29", "30", "51", "55"],
                    backgroundColor: ChartColor[0],
                    borderColor: ChartColor[0],
                    borderWidth: 2
                },
                {
                    type: "bar",
                    label: "Extended",
                    data: ["34", "16", "46", "54", "42", "31", "49"],
                    backgroundColor: ChartColor[1],
                    borderColor: ChartColor[1]
                }
            ]
        };
        var MixedChartCanvas = document
            .getElementById("mixed-chart")
            .getContext("2d");
        lineChart = new Chart(MixedChartCanvas, {
            type: "bar",
            data: chartData,
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: "Revenue and number of lincences sold",
                    fontColor: chartFontcolor
                },
                scales: {
                    xAxes: [
                        {
                            display: true,
                            ticks: {
                                fontColor: chartFontcolor,
                                stepSize: 50,
                                min: 0,
                                max: 150,
                                autoSkip: true,
                                autoSkipPadding: 15,
                                maxRotation: 0,
                                maxTicksLimit: 10
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false,
                                color: chartGridLineColor,
                                zeroLineColor: chartGridLineColor
                            }
                        }
                    ],
                    yAxes: [
                        {
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: "Number of Sales",
                                fontSize: 12,
                                lineHeight: 2,
                                fontColor: chartFontcolor
                            },
                            ticks: {
                                fontColor: chartFontcolor,
                                display: true,
                                autoSkip: false,
                                maxRotation: 0,
                                stepSize: 50,
                                min: 0,
                                max: 100
                            },
                            gridLines: {
                                drawBorder: false,
                                color: chartGridLineColor,
                                zeroLineColor: chartGridLineColor
                            }
                        }
                    ]
                },
                legend: {
                    display: false
                },
                legendCallback: function(chart) {
                    var text = [];
                    text.push(
                        '<div class="chartjs-legend d-flex justify-content-center mt-4"><ul>'
                    );
                    for (var i = 0; i < chart.data.datasets.length; i++) {
                        console.log(chart.data.datasets[i]); // see what's inside the obj.
                        text.push("<li>");
                        text.push(
                            '<span style="background-color:' +
                            chart.data.datasets[i].borderColor +
                            '">' +
                            "</span>"
                        );
                        text.push(chart.data.datasets[i].label);
                        text.push("</li>");
                    }
                    text.push("</ul></div>");
                    return text.join("");
                }
            }
        });
        document.getElementById(
            "mixed-chart-legend"
        ).innerHTML = lineChart.generateLegend();
    }
    if ($("#lineChart").length) {
        var lineData = {
            labels: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep"
            ],
            datasets: [
                {
                    data: [0, 205, 75, 150, 100, 150, 50, 100, 80],
                    backgroundColor: ChartColor[0],
                    borderColor: ChartColor[0],
                    borderWidth: 3,
                    fill: "false",
                    label: "Sales"
                }
            ]
        };
        var lineOptions = {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                filler: {
                    propagate: false
                }
            },
            scales: {
                xAxes: [
                    {
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: "Month",
                            fontSize: 12,
                            lineHeight: 2,
                            fontColor: chartFontcolor
                        },
                        ticks: {
                            fontColor: chartFontcolor,
                            stepSize: 50,
                            min: 0,
                            max: 150,
                            autoSkip: true,
                            autoSkipPadding: 15,
                            maxRotation: 0,
                            maxTicksLimit: 10
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false,
                            color: "transparent",
                            zeroLineColor: "#eeeeee"
                        }
                    }
                ],
                yAxes: [
                    {
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: "Number of sales",
                            fontSize: 12,
                            lineHeight: 2,
                            fontColor: chartFontcolor
                        },
                        ticks: {
                            fontColor: chartFontcolor,
                            display: true,
                            autoSkip: false,
                            maxRotation: 0,
                            stepSize: 100,
                            min: 0,
                            max: 300
                        },
                        gridLines: {
                            drawBorder: false,
                            color: chartGridLineColor,
                            zeroLineColor: chartGridLineColor
                        }
                    }
                ]
            },
            legend: {
                display: false
            },
            legendCallback: function(chart) {
                var text = [];
                text.push('<div class="chartjs-legend"><ul>');
                for (var i = 0; i < chart.data.datasets.length; i++) {
                    console.log(chart.data.datasets[i]); // see what's inside the obj.
                    text.push("<li>");
                    text.push(
                        '<span style="background-color:' +
                        chart.data.datasets[i].borderColor +
                        '">' +
                        "</span>"
                    );
                    text.push(chart.data.datasets[i].label);
                    text.push("</li>");
                }
                text.push("</ul></div>");
                return text.join("");
            },
            elements: {
                line: {
                    tension: 0
                },
                point: {
                    radius: 0
                }
            }
        };
        var lineChartCanvas = $("#lineChart")
            .get(0)
            .getContext("2d");
        var lineChart = new Chart(lineChartCanvas, {
            type: "line",
            data: lineData,
            options: lineOptions
        });
        document.getElementById(
            "line-traffic-legend"
        ).innerHTML = lineChart.generateLegend();
    }
});
