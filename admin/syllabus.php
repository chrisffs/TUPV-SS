<?php 
include '../php/session.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/main.css">
    <title>Document</title>
    <!-- <link
      href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css"
      rel="stylesheet"
    /> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
</head>
<body class="bg-light-100">
<?php 
$page = 'syllabus';
include '../php/header.php' 
?>
<div class="p-2 sm:ml-64 relative">
   <div class="p-4 mt-14">
      <div class="bg-light border border-light-200 rounded-lg h-full">
        <!-- <div>
          <div class="mb-4">
            <h1 class="leading-tight tracking-tight text-xl font-bold">Syllabus Files List</h1>
          </div>
          <div>
            <h2 class="text-base font-medium">Total number of Files: <span class="text-main">204</span></h2>
            <div class="relative overflow-x-auto">
                <table id="myTable" class="pt-3 mb-3 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-2">
                                File Name
                            </th>
                            <th scope="col" class="px-4 py-2">
                                Subject
                            </th>
                            <th scope="col" class="px-4 py-2">
                                Year
                            </th>
                            <th scope="col" class="px-4 py-2">
                                Sem
                            </th>
                            <th scope="col" class="px-4 py-2">
                                Term
                            </th>
                            <th scope="col" class="px-4 py-2">
                                Uploaded by
                            </th>
                            <th scope="col" class="px-4 py-2">
                                Date Uploaded
                            </th>
                            <th scope="col" class="px-4 py-2">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="group/main bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                              <a class="text-main hover:underline hover:underline-offset-4" href="../files/ECON-Learning-Content.pdf" target="_blank">ECON-Learning-Content.pdf</a>
                            </th>
                            <td class="px-4 py-2">
                                Engineering Economics
                            </td>
                            <td class="px-4 py-2">
                                3rd
                            </td>
                            <td class="px-4 py-2">
                                2nd
                            </td>
                            <td class="px-4 py-2">
                                Midterm
                            </td>
                            <td class="px-4 py-2">
                                Ramon Lito
                            </td>
                            <td class="px-4 py-2">
                              2023-10-03 17:16:18
                            </td>
                            <td class="px-4 py-2">
                                <div class="inline-block mr-2 invisible group-hover/main:visible">
                                  <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </div>
                                <div class="inline-block invisible group-hover/main:visible">
                                  <a href="#" class="font-medium text-main dark:text-blue-500 hover:underline">Remove</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
          </div>
        </div> -->
        <div class="w-full">
            <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800" id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                <li class="mr-2">
                    <button id="lists-tab" data-tabs-target="#list" type="button" role="tab" aria-controls="list" aria-selected="true" class="inline-block p-4 text-blue-600 rounded-tl-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">Files List</button>
                </li>
                <li class="mr-2">
                    <button id="pending-tab" data-tabs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="false" class="relative inline-flex items-center p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                      Pending
                      <span class="inline-flex items-center justify-center w-5 h-5 ml-2 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">
                        2
                      </span>
                    </button>
                </li>
            </ul>
            <div id="defaultTabContent">
                <div class="hidden p-6 bg-white rounded-lg dark:bg-gray-800" id="list" role="tabpanel" aria-labelledby="lists-tab">
                  <div>
                    <div class="">
                      <h1 class="leading-tight tracking-tight text-xl font-bold">Syllabus Files List</h1>
                    </div>
                    <div>
                      <h2 class="text-base font-medium mb-6">Total number of Files: <span class="text-main">204</span></h2>
                      <div class="relative overflow-x-auto">
                          <table id="syllabusListTable" class="pt-3 mb-3 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                  <tr>
                                      <th scope="col" class="px-4 py-2">
                                          File Name
                                      </th>
                                      <th scope="col" class="px-4 py-2">
                                          Subject
                                      </th>
                                      <th scope="col" class="px-4 py-2">
                                          Year
                                      </th>
                                      <th scope="col" class="px-4 py-2">
                                          Sem
                                      </th>
                                      <th scope="col" class="px-4 py-2">
                                          Term
                                      </th>
                                      <th scope="col" class="px-4 py-2">
                                          Uploaded by
                                      </th>
                                      <th scope="col" class="px-4 py-2">
                                          Date Uploaded
                                      </th>
                                      <th scope="col" class="px-4 py-2">
                                          Action
                                      </th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                      <th scope="row" class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <a class="text-main hover:underline hover:underline-offset-4" href="../files/ECON-Learning-Content.pdf" target="_blank">ECON-Learning-Content.pdf</a>
                                      </th>
                                      <td class="px-4 py-2">
                                          Engineering Economics
                                      </td>
                                      <td class="px-4 py-2">
                                          3rd
                                      </td>
                                      <td class="px-4 py-2">
                                          2nd
                                      </td>
                                      <td class="px-4 py-2">
                                          Midterm
                                      </td>
                                      <td class="px-4 py-2">
                                          Ramon Lito
                                      </td>
                                      <td class="px-4 py-2">
                                        2023-10-03 17:16:18
                                      </td>
                                      <td class="px-4 py-2">
                                          <div class="inline-block">
                                            <a href="#" class="font-medium text-main dark:text-blue-500 hover:underline">Remove</a>
                                          </div>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="hidden p-6 bg-white rounded-lg dark:bg-gray-800" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                  <div>
                    <div class="">
                      <h1 class="leading-tight tracking-tight text-xl font-bold">Syllabus Pending Files List</h1>
                    </div>
                    <div>
                      <h2 class="text-base font-medium mb-6">Total number of Pending Files: <span class="text-main">204</span></h2>
                      <div class="relative overflow-x-auto">
                          <table id="syllabusPendingTable" class="pt-3 mb-3 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                  <tr>
                                      <th scope="col" class="px-4 py-2">
                                          File Name
                                      </th>
                                      <th scope="col" class="px-4 py-2">
                                          Subject
                                      </th>
                                      <th scope="col" class="px-4 py-2">
                                          Year
                                      </th>
                                      <th scope="col" class="px-4 py-2">
                                          Sem
                                      </th>
                                      <th scope="col" class="px-4 py-2">
                                          Term
                                      </th>
                                      <th scope="col" class="px-4 py-2">
                                          Uploaded by
                                      </th>
                                      <th scope="col" class="px-4 py-2">
                                          Date Uploaded
                                      </th>
                                      <th scope="col" class="px-4 py-2">
                                          Action
                                      </th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                      <th scope="row" class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <a class="text-main hover:underline hover:underline-offset-4" href="../files/ECON-Learning-Content.pdf" target="_blank">ECON-Learning-Content.pdf</a>
                                      </th>
                                      <td class="px-4 py-2">
                                          Engineering Economics
                                      </td>
                                      <td class="px-4 py-2">
                                          3rd
                                      </td>
                                      <td class="px-4 py-2">
                                          2nd
                                      </td>
                                      <td class="px-4 py-2">
                                          Midterm
                                      </td>
                                      <td class="px-4 py-2">
                                          Ramon Lito
                                      </td>
                                      <td class="px-4 py-2">
                                        2023-10-03 17:16:18
                                      </td>
                                      <td class="px-4 py-2">
                                          <div class="inline-block mr-2">
                                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Accept</a>
                                          </div>
                                          <div class="inline-block">
                                            <a href="#" class="font-medium text-main dark:text-blue-500 hover:underline">Decline</a>
                                          </div>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
      </div>
   </div>
</div>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/gridjs/dist/gridjs.umd.js"></script> -->

<script>
  $(document).ready( function () {
    $('#syllabusListTable').DataTable({
      "ordering": false,
      "lengthChange": false,
      "info": false
    });
    $('#syllabusPendingTable').DataTable({
      "ordering": false,
      "lengthChange": false,
      "info": false
    });
} );
</script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
</body>