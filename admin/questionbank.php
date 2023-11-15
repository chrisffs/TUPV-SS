<?php 
include '../php/conn.php';
include '../php/session.php';
Include '../php/TIMEAGO.PHP';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../src/img/tupvlogo.png">
    <link rel="stylesheet" href="../src/css/main.css">
    <link rel="stylesheet" href="../src/css/jquery.dataTables.css">
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <title>Question Bank | TUPV Syllabus System</title>
</head>
<body class="bg-light-100">
<?php 
$page = 'questionbank';
include '../php/header.php' 
?>
<div class="p-2 sm:ml-64 relative">
   <div class="p-4 mt-14">
      <div class="bg-light border border-light-200 rounded-lg h-full px-4 pb-4 pt-2">
         <div class="border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
               <li class="mr-2" role="presentation">
                     <button class="inline-block p-4 border-b-2 rounded-t-lg aria-selected:border-main aria-selected:text-main" id="lists-tab" data-tabs-target="#lists" type="button" role="tab" aria-controls="lists" aria-selected="false">Questions List</button>
               </li>
               <?php
                  $sql = "SELECT COUNT(id)`id` FROM qbchecker_tbl";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  $result = $stmt->fetch(); // Use fetch instead of fetchAll
                  
                  if ($result) {
                     $qtyqbc1 = $result['id'];
                  } else {
                     $qtyqbc1 = 0; // Handle the case when no rows are returned
                  }
               ?>
               <li class="mr-2" role="presentation">
                     <button class="relative inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 aria-selected:border-main aria-selected:text-main" id="pending-tab" data-tabs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="false">
                        Pending
                        <span class="bg-red-200 text-xs font-medium text-red-800 text-center p-1 leading-none rounded-full px-2 dark:bg-blue-900 dark:text-blue-200 ml-1 <?php if($qtyqbc1 == 0) {echo 'hidden';}?>"><?php echo $qtyqbc1; ?></span>
                     </button>
               </li>
            </ul>
         </div>
            
         <div id="myTabContent">
            <div class="hidden pt-4 rounded-lg dark:bg-gray-800" id="lists" role="tabpanel" aria-labelledby="lists-tab">
               <?php
                  $sql = "SELECT COUNT(id)`id` FROM questionbank_tbl";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  $result = $stmt->fetch(); // Use fetch instead of fetchAll
                  
                  if ($result) {
                     $qtyqb = $result['id'];
                  } else {
                     $qtyqb = 0; // Handle the case when no rows are returned
                  }
               ?>
               <div class="mb-6">
                  <h1 class="leading-tight tracking-tight text-2xl font-bold">Questions List</h1>
                  <h2 class="text-sm font-medium">Total number of Questions: <span class="text-main"><?php echo $qtyqb; ?></span></h2>
               </div>
               <div class="relative overflow-x-auto">
                  <table id="" class="qBankListTable pt-3 mb-3 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                     <thead class="text-xs text-gray-700 uppercase dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                           <th scope="col" class="px-4 py-2 font-medium">
                              Question <span class="text-main normal-case">(Click)</span>
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
                        <?php 
                           $sql = "SELECT * FROM questionbank_tbl ORDER BY id DESC";
                           $stmt = $conn->prepare($sql);
                           $stmt->execute();
                           $data = $stmt->fetchAll();   
                           
                           foreach ($data as $row): 
                        ?>
                        <tr class="bg-white border-b dark:bg-gray-800 text-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                           
                           <th scope="row" class="px-4 py-2 font-medium whitespace-nowrap dark:text-white">
                              <a data-modal-target="question-modal" data-modal-toggle="question-modal" class="text-main underline dark:text-red-500 hover:no-underline cursor-pointer question-show" type="button"
                              data-id="<?php echo $row['ID']; ?>"
                          
                              data-year="<?php echo $row['Year']; ?>" 
                              data-subj="<?php echo $row['Subject']; ?>"
                              data-term="<?php echo $row['Term']; ?>"
                              data-sem="<?php echo $row['Semester']; ?>"
                              data-upby="<?php echo $row['uploadedby']; ?>"
                              data-dateup="<?php echo $row['time_uploaded']; ?>"
                              data-question="<?php echo htmlspecialchars($row['Question']); ?>"
                              data-a="<?php echo htmlspecialchars($row['A']); ?>"
                              data-b="<?php echo htmlspecialchars($row['B']); ?>"
                              data-c="<?php echo htmlspecialchars($row['C']); ?>"
                              data-d="<?php echo htmlspecialchars($row['D']); ?>"
                              data-ans="<?php echo $row['Answer']; ?>">
                                 View Question
                              </a>
                           </th>
                           <td class="px-4 py-2">
                              <?php echo $row['Subject']; ?>
                           </td>
                           <td class="px-4 py-2">
                              <?php echo $row['Year']; ?>
                           </td>
                           <td class="px-4 py-2">
                              <?php echo $row['Semester']; ?>
                           </td>
                           <td class="px-4 py-2">
                              <?php echo $row['Term']; ?>
                           </td>
                           <td class="px-4 py-2">
                              <?php echo $row['uploadedby']; ?>
                           </td>
                           <td class="px-4 py-2">
                              <?php 
                              $old_date_timestamp = strtotime($row['time_uploaded']);
                              $date = date('Y/m/d', $old_date_timestamp);
                              echo $date;
                              ?>
                              <span class="block text-xs text-gray-600">
                                 <?php 
                                 $time = date('g:i A', $old_date_timestamp);
                                 echo $time 
                                 ?>
                              </span>
                           </td>
                           <td class="px-4 py-2">
                              <div class="inline-block">
                                 <a href="../php/delete.php?id=<?php echo $row['ID']; ?>&delques=true" onclick="return confirm('Are you sure you want to delete this item?');" class="font-medium text-main dark:text-blue-500 hover:underline">Remove</a>
                              </div>
                           </td>
                        </tr>
                        <?php endforeach ?>
                     </tbody>
                  </table>
               </div>
            </div>


            <div class="hidden pt-4 rounded-lg dark:bg-gray-800" id="pending" role="tabpanel" aria-labelledby="pending-tab">
               <div class="mb-6">
                  <?php
                     $sql = "SELECT COUNT(id)`id` FROM qbchecker_tbl";
                     $stmt = $conn->prepare($sql);
                     $stmt->execute();
                     $result = $stmt->fetch(); // Use fetch instead of fetchAll
                     
                     if ($result) {
                        $qtyqbc = $result['id'];
                     } else {
                        $qtyqbc = 0; // Handle the case when no rows are returned
                     }
                  ?>
          
                  <h1 class="leading-tight tracking-tight text-2xl font-bold">Pending List</h1>
                  <h2 class="text-sm font-medium">Total number of Pending Questions: <span class="text-main"><?php echo $qtyqbc;?></span></h2>
               </div>
               <div class="relative overflow-x-auto">
                  <table id="qBankPendingTable" class="pt-3 mb-3 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                     <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                       
                        <tr>
                           <th scope="col" class="px-4 py-2 font-medium">
                              Question <span class="text-main normal-case">(Click)</span>
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
                     <?php 
                           $sql = "SELECT * FROM qbchecker_tbl";
                           $stmt = $conn->prepare($sql);
                           $stmt->execute();
                           $data1 = $stmt->fetchAll();   
                           
                           foreach ($data1 as $row):
                        ?> 
                        <tr class="bg-white border-b dark:bg-gray-800 text-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                           <th scope="row" class="px-4 py-2 font-medium whitespace-nowrap dark:text-white">
                           <a data-modal-target="question-modalchecker" data-modal-toggle="question-modalchecker" class="text-main underline dark:text-red-500 hover:no-underline cursor-pointer question-showchecker" type="button"
                              data-idchecker="<?php echo $row['id']; ?>"
                              data-questionchecker="<?php echo htmlspecialchars($row['Question']); ?>"
                              data-achecker="<?php echo htmlspecialchars($row['A']); ?>"
                              data-bchecker="<?php echo htmlspecialchars($row['B']); ?>"
                              data-cchecker="<?php echo htmlspecialchars($row['C']); ?>"
                              data-dchecker="<?php echo htmlspecialchars($row['D']); ?>"
                              data-anschecker="<?php echo $row['Answer']; ?>">
                                 View Question <span class="text-main normal-case">(Click)</span>
                              </a> 
                           </th>
                           <td class="px-4 py-2">
                           <?php echo $row['Subject']; ?>
                           </td>
                           <td class="px-4 py-2">
                           <?php echo $row['Year']; ?>
                           </td>
                           <td class="px-4 py-2">
                           <?php echo $row['Semester']; ?>
                           </td>
                           <td class="px-4 py-2">
                           <?php echo $row['Term']; ?>
                           </td>
                           <td class="px-4 py-2">
                           <?php echo $row['uploadedby']; ?>
                           </td>
                           <td class="px-4 py-2">
                           <?php echo $row['time_uploaded']; ?>
                           </td>
                           <td class="px-4 py-2">
                              <div class="inline-block">
                                 <div class="inline-block mr-2">
                                 <form method="POST" action="../php/insert.php" onsubmit="return confirm('Are you sure you want to Accept this?');">
                              <input type="hidden" name="qbid" value="<?php echo $row['id']; ?>">
                                    <button name = "acceptqb1" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Accept</button>
                           </form>         
                                 </div>
                                 <div class="inline-block">
                                 <form method="POST" action="../php/insert.php" onsubmit="return confirm('Are you sure you want to decline this?');">
                               <input type="hidden" name="qbiddec" value="<?php echo $row['id']; ?>">
                                    <button name = "declineqb1"  class="font-medium text-main dark:text-blue-500 hover:underline">Decline</button>
                               </form>
                                 </div>
                              </div>
                           </td>
                        </tr>
                        <?php endforeach ?>
                     </tbody>
                  </table>
               </div>   
            </div>
            <?php 
            include "../php/modal.questionbank.php"
            ?>
         </div>

         
      </div>
   </div>
</div>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
<script src="../src/js/questionbank.js"></script>
<script src="../src/js/jquery.dataTables.js"></script>
</body>
</html>