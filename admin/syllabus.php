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
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" /> -->
    <link rel="stylesheet" href="../src/css/jquery.dataTables.css">
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
</head>
<body class="bg-light-100">
<?php 
$page = 'syllabus';
include '../php/header.php' 
?>
<div class="p-2 sm:ml-64 relative">
   <div class="p-4 mt-14">
      <div class="bg-light border border-light-200 rounded-lg h-full px-4 pb-4 pt-2">
        <div class="border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
               <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg aria-selected:border-main aria-selected:text-main" id="list-tab" data-tabs-target="#list" type="button" role="tab" aria-controls="list" aria-selected="false">Syllabus List</button>
               </li>
               <li class="mr-2" role="presentation">
                    <button class="relative inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 aria-selected:border-main aria-selected:text-main" id="pending-tab" data-tabs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="false">
                    Pending
                    <span class="bg-red-200 text-xs font-medium text-red-800 text-center p-1 leading-none rounded-full px-2 dark:bg-blue-900 dark:text-blue-200 ml-1">99+</span>
                    </button>
               </li>
            </ul>
        </div>
        <div id="myTabContent">
            <div class="hidden pt-4 rounded-lg dark:bg-gray-800" id="list" role="tabpanel" aria-labelledby="list-tab">
                <div>
                    <div class="mb-6">
                        <h1 class="leading-tight tracking-tight text-2xl font-bold">Files List</h1>
                        <h2 class="text-sm font-medium">Total number of Files: <span class="text-main">204</span></h2>
                    </div>
                    <div>
                        <div class="relative overflow-x-auto">
                            <table id="syllabusListTable" class="syllabusTable pt-3 mb-3 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-4 py-2 font-medium">
                                            File Name
                                        </th>
                                        <th scope="col" class="px-4 py-2 font-medium">
                                            Subject
                                        </th>
                                        <th scope="col" class="px-4 py-2 font-medium">
                                            Year
                                        </th>
                                        <th scope="col" class="px-4 py-2 font-medium">
                                            Sem
                                        </th>
                                        <th scope="col" class="px-4 py-2 font-medium">
                                            Term
                                        </th>
                                        <th scope="col" class="px-4 py-2 font-medium">
                                            Uploaded by
                                        </th>
                                        <th scope="col" class="px-4 py-2 font-medium">
                                            Date Uploaded
                                        </th>
                                        <th scope="col" class="px-4 py-2 font-medium">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-white border-b dark:bg-gray-800 text-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row" class="px-4 py-2 font-medium whitespace-nowrap dark:text-white">
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
                                            John Doe
                                        </td>
                                        <td class="px-4 py-2">
                                            2023/10/03 <span class="block text-xs text-gray-600">3:24 PM</span>
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
            <div class="hidden pt-4 rounded-lg dark:bg-gray-800" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                <div>
                    <div class="mb-6">
                        <h1 class="leading-tight tracking-tight text-2xl font-bold">Pending List</h1>
                        <h2 class="text-sm font-medium">Total number of Pending Files: <span class="text-main">204</span></h2>
                    </div>
                    <div>
                        <div class="relative overflow-x-auto">
                            <table id="syllabusPendingTable" class="syllabusTable pt-3 mb-3 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-4 py-2 font-medium">
                                            File Name
                                        </th>
                                        <th scope="col" class="px-4 py-2 font-medium">
                                            Subject
                                        </th>
                                        <th scope="col" class="px-4 py-2 font-medium">
                                            Year
                                        </th>
                                        <th scope="col" class="px-4 py-2 font-medium">
                                            Sem
                                        </th>
                                        <th scope="col" class="px-4 py-2 font-medium">
                                            Term
                                        </th>
                                        <th scope="col" class="px-4 py-2 font-medium">
                                            Uploaded by
                                        </th>
                                        <th scope="col" class="px-4 py-2 font-medium">
                                            Date Uploaded
                                        </th>
                                        <th scope="col" class="px-4 py-2 font-medium">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-white border-b dark:bg-gray-800 text-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row" class="px-4 py-2 font-medium whitespace-nowrap dark:text-white">
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
                                            John Doe
                                        </td>
                                        <td class="px-4 py-2">
                                            2023/10/03 <span class="block text-xs text-gray-600">3:24 PM</span>
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
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
<script>
    $(document).ready( function () {
        // $('#syllabusListTable').DataTable({
        // "ordering": false,
        // "lengthChange": false,
        // "info": false
        // });
        // $('#syllabusPendingTable').DataTable({
        // "ordering": false,
        // "lengthChange": false,
        // "info": false
        // });
        $('.syllabusTable').DataTable({
        "ordering": false,
        "lengthChange": false,
        "info": false
        });
    } );
</script>
<!-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script> -->
<script src="../src/js/jquery.dataTables.js"></script>
</body>