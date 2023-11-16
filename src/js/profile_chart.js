$(document).ready(function() {
    $.ajax({
        url: '../php/fetchData.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {

            let syllabus_options = {
                // enable and customize data labels using the following example, learn more from here: https://apexcharts.com/docs/datalabels/
                dataLabels: {
                  enabled: true,
                  // offsetX: 10,
                  style: {
                    cssClass: 'text-xs text-white font-medium'
                  },    
                },
                grid: {
                  show: false,
                  strokeDashArray: 4,
                  padding: {
                    left: 16,
                    right: 16,
                    top: -26
                  },
                },
                series: [
                  {
                    name: "Syllabus Uploads",
                    data: [150, 141, 145, 152, 135, 125, 145],
                    color: "#1A56DB",
                  },
                ],
                chart: {
                  height: "100%",
                  maxWidth: "100%",
                  type: "area",
                  fontFamily: "Inter, sans-serif",
                  dropShadow: {
                    enabled: false,
                  },
                  toolbar: {
                    show: false,
                  },
                },
                tooltip: {
                  enabled: true,
                  x: {
                    show: false,
                  },
                },
                legend: {
                  show: true
                },
                fill: {
                  type: "gradient",
                  gradient: {
                    opacityFrom: 0.55,
                    opacityTo: 0,
                    shade: "#1C64F2",
                    gradientToColors: ["#1C64F2"],
                  },
                },
                stroke: {
                  width: 6,
                },
                xaxis: {
                  categories: ['01 February', '02 February', '03 February', '04 February', '05 February', '06 February', '07 February'],
                  labels: {
                    show: false,
                  },
                  axisBorder: {
                    show: false,
                  },
                  axisTicks: {
                    show: false,
                  },
                },
                yaxis: {
                  show: false,
                  labels: {
                    formatter: function (value) {
                      return value;
                    }
                  }
                },
              }
            // Update the received categories and data into the syllabus_options
            syllabus_options.xaxis.categories = data.categories;
            // console.log(syllabus_options);
            // syllabus_options.series[0].data = response.data;

            if (document.getElementById("syllabus-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("syllabus-chart"), syllabus_options);
                chart.render();
            }
        },
        error: function(xhr, status, error) {
            // Handle errors if any
            console.error("Error fetching data:", error);
        }
    })
    // let syllabus_options = {
    //     // enable and customize data labels using the following example, learn more from here: https://apexcharts.com/docs/datalabels/
    //     dataLabels: {
    //       enabled: true,
    //       // offsetX: 10,
    //       style: {
    //         cssClass: 'text-xs text-white font-medium'
    //       },
    //     },
    //     grid: {
    //       show: false,
    //       strokeDashArray: 4,
    //       padding: {
    //         left: 16,
    //         right: 16,
    //         top: -26
    //       },
    //     },
    //     series: [
    //       {
    //         name: "Syllabus Uploads",
    //         data: [150, 141, 145, 152, 135, 125, 145],
    //         color: "#1A56DB",
    //       },
    //     ],
    //     chart: {
    //       height: "100%",
    //       maxWidth: "100%",
    //       type: "area",
    //       fontFamily: "Inter, sans-serif",
    //       dropShadow: {
    //         enabled: false,
    //       },
    //       toolbar: {
    //         show: false,
    //       },
    //     },
    //     tooltip: {
    //       enabled: true,
    //       x: {
    //         show: false,
    //       },
    //     },
    //     legend: {
    //       show: true
    //     },
    //     fill: {
    //       type: "gradient",
    //       gradient: {
    //         opacityFrom: 0.55,
    //         opacityTo: 0,
    //         shade: "#1C64F2",
    //         gradientToColors: ["#1C64F2"],
    //       },
    //     },
    //     stroke: {
    //       width: 6,
    //     },
    //     xaxis: {
    //       categories: [],
    //       labels: {
    //         show: false,
    //       },
    //       axisBorder: {
    //         show: false,
    //       },
    //       axisTicks: {
    //         show: false,
    //       },
    //     },
    //     yaxis: {
    //       show: false,
    //       labels: {
    //         formatter: function (value) {
    //           return value;
    //         }
    //       }
    //     },
    //   }
    // // Update the received categories and data into the syllabus_options
    // // syllabus_options.xaxis.categories = response.categories;
    // console.log(syllabus_options.xaxis.categories);
    // syllabus_options.series[0].data = response.data;

    // if (document.getElementById("syllabus-chart") && typeof ApexCharts !== 'undefined') {
    //     const chart = new ApexCharts(document.getElementById("syllabus-chart"), syllabus_options);
    //     chart.render();
    // }
});


