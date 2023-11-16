<?php 
include '../php/conn.php';
include '../php/user_session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/main.css">
    <link rel="icon" href="../src/img/tupvlogo.png">
    <title>Syllabus | TUPV Syllabus System</title>
</head>
<body class="bg-gray-50">
<?php 
include "../php/user_header.php";
?>
<main class="sm:ml-[64px] sm:ml-6 p-4 md:p-6 mt-[60px]">
    <div class="container mx-auto">
        <div class="row-span-1 col-span-3 pb-6">
            <h1 class="text-2xl font-bold">Profile</h1>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="col-span-1 flex flex-col gap-4">
              <?php
              $sql = "SELECT * FROM `accounts_tbl` INNER JOIN departmenttbl ON accounts_tbl.department = departmenttbl.acronym WHERE accounts_tbl.ID = {$_SESSION['ID']} ";
              
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              $data = $stmt->fetchAll();
              
              foreach ($data as $row):
              ?>
              <div class="bg-light border rounded-lg flex flex-col gap-4 p-8">
                <div class="">
                    <img src="../files/userpics/<?php echo $row['user_picture']; ?>" class="object-cover w-32 h-32 rounded-lg" alt="" srcset="">
                </div>
                <div class="">
                    <h1 class="text-xl font-semibold"><?php echo $row['full_name']; ?></h1>
                </div>
                <div class="flex flex-col gap-1 border-b">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                            <path d="M18 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM6.5 3a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3.014 13.021l.157-.625A3.427 3.427 0 0 1 6.5 9.571a3.426 3.426 0 0 1 3.322 2.805l.159.622-6.967.023ZM16 12h-3a1 1 0 0 1 0-2h3a1 1 0 0 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Z"/>
                        </svg>
                        <h1 class="text-sm text-gray-600"><?php echo $row['tupv_id']; ?></h1>
                    </div>
                    <div class="flex items-center gap-2 pb-4">
                        <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
                            <path d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z"/>
                            <path d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z"/>
                        </svg>
                        <h1 class="text-sm text-gray-600"><?php echo $row['dptname']; ?></h1>
                    </div>

             
                </div>




   
<!-- Modal toggle -->
<button id = "accountModalBtn" data-modal-target="static-modal" data-modal-toggle="static-modal" class="block text-gray-600 transition duration-200 hover:text-red-500  rounded-lg text-md font-semibold px-5 py-2.5 text-center transform hover:scale-105" type="button">  
Make changes to your account
</button>

<!-- Main modal -->
<div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Account Settings
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
            <p id="id" class="hidden eading-relaxed text-gray-500 dark:text-gray-400"></p>
            <p id="accountDescription" class="text-base leading-relaxed text-gray-500 dark:text-gray-400"></p>
            <p id="accountUsername" class="text-base leading-relaxed text-gray-500 dark:text-gray-400"></p>
            <p id="accountFullName" class="text-base leading-relaxed text-gray-500 dark:text-gray-400"></p>
            <p id="accountDepartment" class="text-base leading-relaxed text-gray-500 dark:text-gray-400"></p>
            <p id="accountType" class="text-base leading-relaxed text-gray-500 dark:text-gray-400"></p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="static-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                <button data-modal-hide="static-modal" type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
            </div>
        </div>
    </div>
</div>


                
               
              </div>
              <?php endforeach; ?>
              <div class="w-full bg-white rounded-lg border dark:bg-gray-800 p-4 md:p-6">
                <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg">
                  <div class="grid grid-cols-3 gap-3">
                    <dl class="bg-teal-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                      <dt class="w-8 h-8 rounded-full bg-teal-100 dark:bg-gray-500 text-teal-600 dark:text-teal-300 text-sm font-medium flex items-center justify-center mb-1">
                      <?php
                      $sql = "SELECT SUM(upload_count) AS total_count FROM ( SELECT COUNT(*) AS upload_count FROM qbchecker_tbl WHERE uploaderId = {$_SESSION['ID']} UNION ALL SELECT COUNT(*) AS upload_count FROM syllabuschecker_tbl WHERE uploaderId = {$_SESSION['ID']} ) AS combined_counts";
                      
                      $stmt = $conn->prepare($sql);
                      $stmt->execute();
                      $data = $stmt->fetchAll();
                      
                      foreach ($data as $row):
                      echo $row['total_count'];
                      endforeach; ?>
                      </dt>
                      <dd class="text-teal-600 dark:text-teal-300 text-sm font-medium">Pendings</dd>
                    </dl>
                    <dl class="bg-orange-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                      <dt class="w-8 h-8 rounded-full bg-orange-100 dark:bg-gray-500 text-orange-600 dark:text-orange-300 text-sm font-medium flex items-center justify-center mb-1">
                      <?php
                      $sql = "SELECT SUM(upload_count) AS total_count FROM ( SELECT COUNT(*) AS upload_count FROM qbdecline_tbl WHERE uploaderId = {$_SESSION['ID']} UNION ALL SELECT COUNT(*) AS upload_count FROM declinedsyllabus_tbl WHERE uploaderId = {$_SESSION['ID']} ) AS combined_counts;";
                      
                      $stmt = $conn->prepare($sql);
                      $stmt->execute();
                      $data = $stmt->fetchAll();
                      
                      foreach ($data as $row):
                      echo $row['total_count'];
                      endforeach; ?>
                      </dt>
                      <dd class="text-orange-600 dark:text-orange-300 text-sm font-medium">Declined</dd>
                    </dl>
                    <dl class="bg-blue-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                      <dt class="w-8 h-8 rounded-full bg-blue-100 dark:bg-gray-500 text-blue-600 dark:text-blue-300 text-sm font-medium flex items-center justify-center mb-1">
                      <?php
                      $sql = "SELECT SUM(upload_count) AS total_count FROM ( SELECT COUNT(*) AS upload_count FROM questionbank_tbl WHERE uploaderId = {$_SESSION['ID']} UNION ALL SELECT COUNT(*) AS upload_count FROM syllabus_tbl WHERE USERUPLOADID = {$_SESSION['ID']} ) AS combined_counts;";
                      
                      $stmt = $conn->prepare($sql);
                      $stmt->execute();
                      $data = $stmt->fetchAll();
                      
                      foreach ($data as $row):
                      echo $row['total_count'];
                      endforeach; ?>
                      </dt>
                      <dd class="text-blue-600 dark:text-blue-300 text-sm font-medium">Accepted</dd>
                    </dl>
                  </div>
                  <!-- <button data-collapse-toggle="more-details" type="button" class="hover:underline text-xs text-gray-500 dark:text-gray-400 font-medium inline-flex items-center">Show more details <svg class="w-2 h-2 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                  </button>
                  <div id="more-details" class="border-gray-200 border-t dark:border-gray-600 pt-3 mt-3 space-y-2 hidden">
                    <dl class="flex items-center justify-between">
                      <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal">Average task completion rate:</dt>
                      <dd class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">
                        <svg class="w-2.5 h-2.5 mr-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                        </svg> 57%
                      </dd>
                    </dl>
                    <dl class="flex items-center justify-between">
                      <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal">Days until sprint ends:</dt>
                      <dd class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-gray-600 dark:text-gray-300">13 days</dd>
                    </dl>
                    <dl class="flex items-center justify-between">
                      <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal">Next meeting:</dt>
                      <dd class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-gray-600 dark:text-gray-300">Thursday</dd>
                    </dl>
                  </div> -->
                </div>
                <div class="w-full">
                  <div class="flex justify-between mb-4">
                      <!-- <div class="flex justify-center items-center">
                          <h5 class="text-xl font-semibold leading-none text-gray-900 dark:text-white pr-1">Acceptance Rate</h5>
                          <svg data-popover-target="chart-info" data-popover-placement="bottom" class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z"/>
                          </svg>
                          <div data-popover id="chart-info" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                              <div class="p-3 space-y-2">
                                  <h3 class="font-semibold text-gray-900 dark:text-white">Activity growth - Incremental</h3>
                                  <p>Report helps navigate cumulative growth of community activities. Ideally, the chart should have a growing trend, as stagnating chart signifies a significant decrease of community activity.</p>
                                  <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                                  <p>For each date bucket, the all-time volume of activities is calculated. This means that activities in period n contain all activities up to period n, plus the activities generated by your community in period.</p>
                                  <a href="#" class="flex items-center font-medium text-blue-600 dark:text-blue-500 dark:hover:text-blue-600 hover:text-blue-700 hover:underline">Read more <svg class="w-2 h-2 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                              </svg></a>
                              </div>
                              <div data-popper-arrow></div>
                          </div>
                      </div> -->
                  </div>
                  <div>
                      <div class="flex" id="devices">
                          <div class="flex items-center mr-4">
                              <input id="syllabus" type="checkbox" value="syllabus" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 checked:bg-blue-600">
                              <label for="syllabus" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Syllabus</label>
                          </div>
                          <div class="flex items-center mr-4">
                              <input id="qbank" type="checkbox" value="qbank" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 checked:bg-blue-600">
                              <label for="qbank" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Question Bank</label>
                          </div>
                      </div>
                  </div>
                  <div class="py-6" id="rate-chart"></div>
                </div>
              </div>
              
            </div>
            <div class="col-span-2 flex flex-col gap-4">
                <div class="bg-white rounded-lg border p-6">
                    <h1 class="font-semibold text-xl">Your Stats</h1>
                </div>

                <div class="flex flex-col gap-4 grow">
                    <div class="h-1/2">
                        <div class="flex flex-col justify-between h-full w-full bg-white rounded-lg border dark:bg-gray-800 p-4 md:p-6">
                            <div class="flex justify-between">
                                <div>
                                    <h5 title="Total Uploaded Files" class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">52</h5>
                                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Syllabus uploads this week</p>
                                </div>
                                <div title="Uploaded 12% of all Syllabus files" class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                                    2%
                                    <svg class="w-3 h-3 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="" id="syllabus-chart"></div>
                        </div>
                    </div>
                    <div class="h-1/2">
                        <div class="flex flex-col justify-between h-full w-full w-full bg-white rounded-lg border dark:bg-gray-800 p-4 md:p-6">
                            <div class="flex justify-between">
                                <div>
                                    <h5 title="Total Submitted Questions" class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">231</h5>
                                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Question Bank submissions this week</p>
                                </div>
                                <div class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                                    12%
                                    <svg class="w-3 h-3 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                                    </svg>
                                </div>
                            </div>
                            <div id="qbank-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
<script src="../node_modules/apexcharts/dist/apexcharts.min.js"></script>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../src/js/profile_chart.js"></script>
<script>
const results = [232, 23]; // Assuming the array represents [wins, losses]

const [totalWins, totalLosses] = results;

// Using reduce() to calculate the win rate
const winRate = results.reduce((acc, value) => acc / (acc + value), 0) * 100;

console.log(`Win rate: ${winRate.toFixed(2)}%`);

  // ApexCharts options and config
  window.addEventListener("load", function() {
    // let syllabus_options = {
    //   chart: {
    //     height: "100%",
    //     maxWidth: "100%",
    //     type: "area",
    //     fontFamily: "Inter, sans-serif",
    //     dropShadow: {
    //       enabled: false,
    //     },
    //     toolbar: {
    //       show: false,
    //     },
    //   },
    //   tooltip: {
    //     enabled: true,
    //     x: {
    //       show: false,
    //     },
    //   },
    //   fill: {
    //     type: "gradient",
    //     gradient: {
    //       opacityFrom: 0.55,
    //       opacityTo: 0,
    //       shade: "#C4203C",
    //       gradientToColors: ["#C4203C"],
    //     },
    //   },
    //   dataLabels: {
    //     enabled: false,
    //   },
    //   stroke: {
    //     width: 6,
    //   },
    //   grid: {
    //     show: false,
    //     strokeDashArray: 4,
    //     padding: {
    //       left: 2,
    //       right: 2,
    //       top: 0
    //     },
    //   },
    //   series: [
    //     {
    //       name: "Syllabus Uploads",
    //       data: [8, , , , ,],
    //       color: "#C4203C",
    //     }
    //   ],
    //   xaxis: {
    //     categories: ['01 February', '02 February', '03 February', '04 February', '05 February', '06 February', '07 February'],
    //     labels: {
    //       show: false,
    //     },
    //     axisBorder: {
    //       show: false,
    //     },
    //     axisTicks: {
    //       show: false,
    //     },
    //   },
    //   yaxis: {
    //     show: false,
    //   },
    // }
    // let syllabus_options = {
    //   // enable and customize data labels using the following example, learn more from here: https://apexcharts.com/docs/datalabels/
    //   dataLabels: {
    //     enabled: true,
    //     // offsetX: 10,
    //     style: {
    //       cssClass: 'text-xs text-white font-medium'
    //     },
    //   },
    //   grid: {
    //     show: false,
    //     strokeDashArray: 4,
    //     padding: {
    //       left: 16,
    //       right: 16,
    //       top: -26
    //     },
    //   },
    //   series: [
    //     {
    //       name: "Syllabus Uploads",
    //       data: [150, 141, 145, 152, 135, 125],
    //       color: "#1A56DB",
    //     },
    //   ],
    //   chart: {
    //     height: "100%",
    //     maxWidth: "100%",
    //     type: "area",
    //     fontFamily: "Inter, sans-serif",
    //     dropShadow: {
    //       enabled: false,
    //     },
    //     toolbar: {
    //       show: false,
    //     },
    //   },
    //   tooltip: {
    //     enabled: true,
    //     x: {
    //       show: false,
    //     },
    //   },
    //   legend: {
    //     show: true
    //   },
    //   fill: {
    //     type: "gradient",
    //     gradient: {
    //       opacityFrom: 0.55,
    //       opacityTo: 0,
    //       shade: "#1C64F2",
    //       gradientToColors: ["#1C64F2"],
    //     },
    //   },
    //   stroke: {
    //     width: 6,
    //   },
    //   xaxis: {
    //     categories: ['01 February', '02 February', '03 February', '04 February', '05 February', '06 February', '07 February'],
    //     labels: {
    //       show: false,
    //     },
    //     axisBorder: {
    //       show: false,
    //     },
    //     axisTicks: {
    //       show: false,
    //     },
    //   },
    //   yaxis: {
    //     show: false,
    //     labels: {
    //       formatter: function (value) {
    //         return value;
    //       }
    //     }
    //   },
    // }
    // // syllabus_options.series[0].data = data;
    // console.log(syllabus_options.series[0].data);
    // if (document.getElementById("syllabus-chart") && typeof ApexCharts !== 'undefined') {
    //   const chart = new ApexCharts(document.getElementById("syllabus-chart"), syllabus_options);
    //   chart.render();
    // }
    

    let qbank_options = {
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
      fill: {
        type: "gradient",
        gradient: {
          opacityFrom: 0.55,
          opacityTo: 0,
          shade: "#15803d",
          gradientToColors: ["#15803d"],
        },
      },
      dataLabels: {
        enabled: false,
      },
      stroke: {
        width: 6,
      },
      grid: {
        show: false,
        strokeDashArray: 4,
        padding: {
          left: 2,
          right: 2,
          top: 0
        },
      },
      series: [
        {
          name: "Question Bank Submissions",
          data: [0, 52, 12, 10, 18, 5],
          color: "#15803d",
        }
      ],
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
      },
    }
    if (document.getElementById("qbank-chart") && typeof ApexCharts !== 'undefined') {
      const chart = new ApexCharts(document.getElementById("qbank-chart"), qbank_options);
      chart.render();
    }

    const options = {
      colors: ["#1A56DB", "#FDBA74"],
      series: [
        {
          name: "Syllabus Uploads",
          color: "#1A56DB",
          data: [
            { x: "Mon", y: 1 },
            { x: "Tue", y: 12 },
            { x: "Wed", y: 3 },
            { x: "Thu", y: 21 },
            { x: "Fri", y: 2 },
            { x: "Sat", y: 3 },
            { x: "Sun", y: 11 },
          ],
        },
        {
          name: "Question Bank Submissions",
          color: "#FDBA74",
          data: [
            { x: "Mon", y: 32 },
            { x: "Tue", y: 13 },
            { x: "Wed", y: 41 },
            { x: "Thu", y: 24 },
            { x: "Fri", y: 22 },
            { x: "Sat", y: 11 },
            { x: "Sun", y: 43 },
          ],
        },
      ],
      chart: {
        type: "bar",
        height: "320px",
        fontFamily: "Inter, sans-serif",
        toolbar: {
          show: false,
        },
      },
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: "70%",
          borderRadiusApplication: "end",
          borderRadius: 8,
        },
      },
      tooltip: {
        shared: true,
        intersect: false,
        style: {
          fontFamily: "Inter, sans-serif",
        },
      },
      states: {
        hover: {
          filter: {
            type: "darken",
            value: 1,
          },
        },
      },
      stroke: {
        show: true,
        width: 0,
        colors: ["transparent"],
      },
      grid: {
        show: false,
        strokeDashArray: 4,
        padding: {
          left: 2,
          right: 2,
          top: -14
        },
      },
      dataLabels: {
        enabled: false,
      },
      legend: {
        show: false,
      },
      xaxis: {
        floating: false,
        labels: {
          show: true,
          style: {
            fontFamily: "Inter, sans-serif",
            cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
          }
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
      },
      fill: {
        opacity: 1,
      },
    }

    if(document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
      const chart = new ApexCharts(document.getElementById("column-chart"), options);
      chart.render();
    }

    const getChartOptions = () => {
        return {
          series: [11, 9],
          colors: ["#1C64F2", "#16BDCA"],
          chart: {
            height: 320,
            width: "100%",
            type: "donut",
          },
          stroke: {
            colors: ["transparent"],
            lineCap: "",
          },
          plotOptions: {
            pie: {
              donut: {
                labels: {
                  show: true,
                  name: {
                    show: true,
                    fontFamily: "Inter, sans-serif",
                    offsetY: 20,
                  },
                  total: {
                    showAlways: true,
                    show: true,
                    label: "Acceptance Rate",
                    fontFamily: "Inter, sans-serif",
                    formatter: function (w) {
                      const sum = (w.globals.seriesTotals[0] / (w.globals.seriesTotals[0] + w.globals.seriesTotals[1]))
                      const percent = sum * 100
                      return `${percent.toFixed(2)}%`
                    },
                  },
                  value: {
                    show: true,
                    fontFamily: "Inter, sans-serif",
                    offsetY: -20,
                    formatter: function (value) {
                      return value 
                    },
                  },
                },
                size: "80%",
              },
            },
          },
          grid: {
            padding: {
              top: -2,
            },
          },
          labels: ["Accepted", "Declined"],
          dataLabels: {
            enabled: false,
          },
          legend: {
            position: "bottom",
            fontFamily: "Inter, sans-serif",
          },
          yaxis: {
            labels: {
              formatter: function (value) {
                return value + ""
              },
            },
          },
          xaxis: {
            labels: {
              formatter: function (value) {
                return value  + ""
              },
            },
            axisTicks: {
              show: false,
            },
            axisBorder: {
              show: false,
            },
          },
        }
      }

      if (document.getElementById("rate-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("rate-chart"), getChartOptions());
        chart.render();

        // Get all the checkboxes by their class name
        const checkboxes = document.querySelectorAll('#devices input[type="checkbox"]');

        // // Function to handle the checkbox change event
        // function handleCheckboxChange(event, chart) {
        //     const checkbox = event.target;
        //     if (checkbox.checked) {
        //         switch(checkbox.value) {
        //           case 'syllabus':
        //             chart.updateSeries([3, 7]);
        //             break;
        //           case 'qbank':
        //             chart.updateSeries([8, 2]);
        //             break;
        //           default:
        //             chart.updateSeries([9, 1]);
        //         }
        //     } else {
        //         chart.updateSeries([6, 4]);
        //     }
        // }
        function handleCheckboxChange() {
          const series = [];

          checkboxes.forEach(checkbox => {
              if (checkbox.checked) {
                  switch (checkbox.value) {
                      case 'syllabus':
                          series.push([3, 7]);
                          break;
                      case 'qbank':
                          series.push([8, 2]);
                          break;
                      default:
                          series.push([11, 9]);
                  }
              }
          });

          if (series.length === 0) {
              chart.updateSeries([11, 9]); // Default series if no checkbox is checked
          } else {
              const updatedSeries = series.reduce((acc, val) => [acc[0] + val[0], acc[1] + val[1]]);
              chart.updateSeries(updatedSeries);
          }
      }

        // Attach the event listener to each checkbox
        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', (event) => handleCheckboxChange(event, chart));
        });
      }
  });


  
  document.getElementById('accountModalBtn').addEventListener('click', function () {
      
        var accountId = '<?php echo $_SESSION['ID']; ?>';

        fetch('./fetch_accounts.php?accountId=' + encodeURIComponent(accountId))
            .then(response => response.json())
            .then(data => {
                // Update modal content with fetched data
                document.getElementById('accountDescription').textContent = data.description;
                document.getElementById('accountUsername').textContent = 'Username: ' + data.username;
                document.getElementById('accountFullName').textContent = 'Full Name: ' + data.full_name;
                document.getElementById('accountDepartment').textContent = 'Department: ' + data.department;
                document.getElementById('accountType').textContent = 'Type: ' + data.type;
                // Update other elements with account information
            })
            .catch(error => console.error('Error fetching account data:', error));
    });
</script>
</body>
</html>