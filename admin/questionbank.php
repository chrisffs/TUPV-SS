<?php 
include '../php/session.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/main.css">
    <link rel="stylesheet" href="../src/css/jquery.dataTables.css">
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <title>Document</title>
</head>
<body class="bg-light-100">
<?php 
$page = 'questionbank';
include '../php/header.php' 
?>
<div class="p-2 sm:ml-64 relative">
   <div class="p-4 mt-14">
      <div class="bg-light border border-light-200 rounded-lg h-full">
         <div class="border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
               <li class="mr-2" role="presentation">
                     <button class="inline-block p-4 border-b-2 rounded-t-lg aria-selected:border-main aria-selected:text-main" id="lists-tab" data-tabs-target="#lists" type="button" role="tab" aria-controls="lists" aria-selected="false">Questions List</button>
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
            <div class="hidden p-4 rounded-lg dark:bg-gray-800" id="lists" role="tabpanel" aria-labelledby="lists-tab">
            <div class="relative overflow-x-auto">
               <table id="qBankListTable" class="pt-3 mb-3 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                           <th scope="col" class="px-4 py-2">
                              Question <span class="text-main normal-case font-medium">(Click)</span>
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
                           <th scope="row" class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                              <a data-modal-target="small-modal" data-modal-toggle="small-modal" class="text-main underline dark:text-red-500 hover:no-underline cursor-pointer" type="button">
                                 Question
                              </a>
                           </th>
                           <div id="small-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                 <div class="relative w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                          <!-- Modal header -->
                                          <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                                             <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                                Small modal
                                             </h3>
                                             <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="small-modal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                             </button>
                                          </div>
                                          <!-- Modal body -->
                                          <div class="p-6 space-y-6">
                                             <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                                             </p>
                                             <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                                             </p>
                                          </div>
                                          <!-- Modal footer -->
                                          <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                             <button data-modal-hide="small-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                                             <button data-modal-hide="small-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                                          </div>
                                    </div>
                                 </div>
                              </div>
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
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="pending" role="tabpanel" aria-labelledby="pending-tab">
               
            </div>
         </div>
      </div>
   </div>
</div>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
<script>
$(document).ready( function () {
   $('#qBankListTable').DataTable({
      "ordering": false,
      "lengthChange": false,
      "info": false
   });
   $('#qBankPendingTable').DataTable({
      "ordering": false,
      "lengthChange": false,
      "info": false
   });
} );
</script>
<script src="../src/js/jquery.dataTables.js"></script>
</body>