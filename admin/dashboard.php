<?php 
include '../php/conn.php';
include '../php/session.php';
include '../php/TIMEAGO.PHP';
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
    <title>Dashboard | TUPV Syllabus System</title>
</head>
<body class="bg-light-100">

<?php 
$page = 'dashboard';
include '../php/header.php' 

?>

<div class="absolute w-full">
   <img src="../src/img/admin_bg.png" class="object-cover w-full z-0 h-[16rem]" srcset="">
</div>
<div class="p-2 sm:ml-64 relative">
   <div class="p-4 mt-14">
      <div class="mb-10">
         <h1 class="text-4xl font-bold text-light">Hello, <?php echo $_SESSION['full_name']?>!</h1>
         <h5 class="text-light text-xl"><?php echo $_SESSION['tupv_id']?></h5>
         <h4 class="text-light text-xl">Welcome Back!</h4>
      </div>
      <div class="grid grid-cols-4 gap-4 mb-6">
         <div class="flex items-center bg-light p-6 border border-light-200 rounded-lg">
            <div class="bg-light-100 p-4 rounded-lg me-6">
               <svg class="w-[32px] h-[32px] text-main dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 17V2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H3a2 2 0 0 0-2 2Zm0 0a2 2 0 0 0 2 2h12M5 15V1m8 18v-4"/>
               </svg>
            </div>
            <div>
               <?php
               $sql = "SELECT COUNT(id)`id` FROM syllabus_tbl";
               $stmt = $conn->prepare($sql);
               $stmt->execute();
               $result = $stmt->fetch(); // Use fetch instead of fetchAll

               if ($result) {
                  $qty232 = $result['id'];
               } else {
                  $qty232 = 0; // Handle the case when no rows are returned
               }
               ?>
               <h1 class="text-2xl font-bold text-dark"><?php echo $qty232; ?> </h1>
               <h3 class="text-sm text-secondary">Modules Uploaded</h3>
            </div>
         </div>
         <div class="flex items-center bg-light p-6 border border-light-200 rounded-lg">
            <div class="bg-light-100 p-4 rounded-lg me-6">
               <svg class="w-[32px] h-[32px] text-main dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.529 7.988a2.502 2.502 0 0 1 5 .191A2.441 2.441 0 0 1 10 10.582V12m-.01 3.008H10M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
               </svg>
            </div>
            <div>
            <?php
               $sql = "SELECT COUNT(ID)`ID` FROM questionbank_tbl";
               $stmt = $conn->prepare($sql);
               $stmt->execute();
               $result = $stmt->fetch(); // Use fetch instead of fetchAll

               if ($result) {
                  $qty232 = $result['ID'];
               } else {
                  $qty232 = 0; // Handle the case when no rows are returned
               }
               ?>
               <h1 class="text-2xl font-bold text-dark"><?php echo $qty232; ?></h1>
               <h3 class="text-sm text-secondary">Questions Made</h3>
            </div>
         </div>
         
         <div class="col-span-2 flex items-center bg-light p-6 border border-light-200 rounded-lg">
            <div class="bg-light-100 p-4 text-center rounded-lg me-6">
               <h1 class="font-bold text-main text-3xl">24</h1>
               <h3 class="text-sm text-secondary">September</h3>
            </div>
            <div>
               <h3 class="text-sm text-secondary">Upcoming Events</h3>
               <h1 class="text-2xl font-bold text-dark">Prelim Examination</h1>
            </div>
         </div>
      </div>
      <div class="grid grid-cols-3 gap-4">
         <div class="col-span-1">
            <h1 class="leading-tight tracking-tight text-xl font-bold mb-2">Recent</h1>
         </div>
         <div class="col-span-2">
            <h1 class="leading-tight tracking-tight text-xl font-bold mb-2">Quick Actions</h1>
         </div>
      </div>
      <!-- ========== ACTIVITY LOG -------------------------- -->
      <div class="grid grid-cols-3 grid-rows-2 gap-4 content-stretch">
         <div class="col-span-1 row-span-2">
         <?php
         $sql = "SELECT * FROM actlog_tbl ORDER BY upload_time DESC LIMIT 5";
         $stmt = $conn->prepare($sql);
         $stmt->execute();
         $data = $stmt->fetchAll();
         ?>
<div class="bg-light p-6 border border-light-200 rounded-lg">
    <h2 class="leading-tight tracking-tight font-semibold text-dark mb-4">Activity Log</h2>
    <div class="mb-4 min-h-[480px]">
        <ol class="divide-y divider-gray-200 dark:divide-gray-700">
            <?php foreach ($data as $row): ?>
                <li>
                    <!-- questions -->
                    <div class="group/main cursor-default px-2 py-3 flex align-center hover:bg-gray-100 dark:hover:bg-gray-700">
                        <div class="w-5/6 flex gap-2 text-gray-600 dark:text-gray-400">
                            <div>
                            <?php
                    $activityType = $row['type'];
                    if ($activityType === "Question") {
                        $imageSrc = '<svg class="w-6 h-6 text-main dark-text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z"/></svg>';
                    } elseif ($activityType === "Syllabus") {
                        $imageSrc = '<svg class="w-6 h-6 text-main dark-text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20"><path d="M16 14V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 0 0 0-2h-1v-2a2 2 0 0 0 2-2ZM4 2h2v12H4V2Zm8 16H3a1 1 0 0 1 0-2h9v2Z"/></svg>';
                    } else {
                        $imageSrc = '<svg class="w-6 h-6 text-main dark-text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20"><path d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM10.5 6a1.5 1.5 0 1 1 0 2.999A1.5 1.5 0 0 1 10.5 6Zm2.221 10.515a1 1 0 0 1-.858.485h-8a1 1 0 0 1-.9-1.43L5.6 10.039a.978.978 0 0 1 .936-.57 1 1 0 0 1 .9.632l1.181 2.981.541-1a.945.945 0 0 1 .883-.522 1 1 0 0 1 .879.529l1.832 3.438a1 1 0 0 1-.031.988Z"/> <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z"/></svg>';
                    }
                    echo $imageSrc;
                    ?>
                            </div>
                            <div class="min-w-0">
                                <h4 class="text-main text-xs font-medium mb-1"><span><?= $row['type']; ?>   </span>•<span class="text-gray-400 italic"> <?php echo getTimeAgo($row['upload_time']); ?></span></h4>
                                <h4 class="text-dark text-sm font-medium"><?= $row['choice']; ?> <span class="text-main italic"><?= $row['type_content']; ?></span> Submitted by <span class="font-semibold text-dark"><?= $row['upload_name']; ?></span> </h4>
                                <h4 class="text-gray-500 text-sm truncate"><?= $row['content']; ?></h4>
                            </div>
                        </div>
                      
                    </div>
                </li>
            <?php endforeach; ?>

                  
                 
                  </ol>
                  <!-- END ------------------------------------------ -->
               </div>
               <div class="mt-auto mx-0 text-end">
                  <a href="#" class="inline-flex items-center font-medium text-main hover:text-red-800">
                     View more
                     <svg class="w-2.5 h-2.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                     </svg>
                  </a>
               </div>
            </div>
         </div>
         <div class="flex flex-col col-span-2 row-span-1 bg-light p-6 border border-light-200 rounded-lg h-50">
            <h2 class="leading-tight tracking-tight font-semibold text-dark mb-4">Pending Questions</h2>
            <div class="mb-4">

                      <?php
                     $sql = "SELECT * FROM qbchecker_tbl ORDER BY time_uploaded DESC LIMIT 5";
                     $stmt = $conn->prepare($sql);
                     $stmt->execute();
                     $data = $stmt->fetchAll();
                     ?>
               <ol class="divide-y divider-gray-200 dark:divide-gray-700">
                  <!-- START -->  <?php if (count($data) === 0): ?>
                     <div class="flex justify-center items-center h-32">
                     <p class="text-gray-500">No pending right now</p>
                  </div>
               <?php else: ?>
                  <?php foreach ($data as $row): ?>
                  <li>
                     <div class="group/main cursor-default p-4 flex align-center hover:bg-gray-100 dark:hover:bg-gray-700">
                        <div class="w-11/12 flex gap-2 text-gray-600 dark:text-gray-400">
                           <div class="grow">
                              <div class="flex align-center mb-1">
                                 <img src="../src/img/profile_image.jpg" class="rounded-full h-4 w-4 mr-2" alt="" srcset="">
                                 <h4 class="text-main text-xs font-medium mb-1"><span class="text-dark"><?= $row['uploadedby']; ?>   </span>•<span class="text-gray-400 italic">   <?php echo getTimeAgo($row['time_uploaded']); ?></span></h4>
                              </div>
                              
                              <h4 class="text-dark text-sm font-medium"><?= $row['Question']; ?></h4>
                              <div class="flex text-sm justify-between">
                                 <h4 class="text-dark">A. <?= $row['A']; ?></h4>
                                 <h4 class="text-dark">B. <?= $row['B']; ?></h4>
                                 <h4 class="text-dark">C. <?= $row['C']; ?></h4>
                                 <h4 class="text-dark">D. <?= $row['D']; ?></h4>
                              </div>
                              <div class="mt-2 flex flex-wrap gap-2">
                               
                                 <div class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300"><?= $row['Subject']; ?></div>
                                 <div class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300"><?= $row['Year']; ?></div>
                                 <div class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300"><?= $row['Term']; ?></div>
                                 <div class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300"><?= $row['Semester']; ?></div>   
                              </div>
                           </div>
                        </div>


                        <!-- ACCEPT QB CHECKER -->
                        <div class="invisible group-hover/main:visible w-1/12 flex gap-2 flex-col justify-center items-center">
                        <form method="POST" action="../php/insert.php" onsubmit="return confirm('Are you sure you want to Accept this?');">
                        <input type="hidden" name="qbid" value="<?php echo $row['id']; ?>">
                           <button name = "acceptqb" class="text-sm font-medium text-main p-1.5 hover:bg-light-200 rounded-lg dark:text-blue-500 dark:hover:bg-gray-700" href="#">
                              <svg class="w-5 h-5 text-main dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                              </svg>
                           </button>
                     </form>

                     <!-- DECLINE QB CHECKER -->
                     <form method="POST" action="../php/insert.php" onsubmit="return confirm('Are you sure you want to decline this?');">
                     <input type="hidden" name="qbiddec" value="<?php echo $row['id']; ?>">
                           <button name = "declineqb" class="text-sm font-medium text-main p-1.5 hover:bg-light-200 rounded-lg dark:text-blue-500 dark:hover:bg-gray-700" href="#">
                              <svg class="w-5 h-5 text-secondary dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                              </svg>
                           </button>
                  </form>
                           
                        </div>
                     </div>
                  </li>

                  <?php endforeach; ?>
                  <?php endif; ?>


                  <!-- END -->
                
               </ol>
            </div>
            <div class="self-end mt-auto mx-0 text-end">
               <a href="../ADMIN/questionbank.php" class="inline-flex items-center font-medium text-main hover:text-red-800">
                  View more
                  <svg class="w-2.5 h-2.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                  </svg>
               </a>
            </div>
         </div>

         <!-- ========================= PENDING MODULES ====================== -->
         <div class="flex flex-col col-span-2 row-span-1 bg-light p-6 border border-light-200 rounded-lg h-50">
            <h2 class="leading-tight tracking-tight font-semibold text-dark mb-4">Pending Modules</h2>
            <div class="mb-4">
               <?php 
                  $sql = "SELECT * FROM syllabuschecker_tbl  ";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  $data = $stmt->fetchAll();

   
                 
               ?>
               <ol class="divide-y divider-gray-200 dark:divide-gray-700">
                   <!-- START -->
                   <?php if (count($data) === 0): ?>
                     <div class="flex justify-center items-center h-32">
                     <p class="text-gray-500">No pending right now</p>
                  </div>
               <?php else: ?>
                   <?php foreach ($data as $row): ?>
                  <li>
                     <div class="group/main cursor-default px-4 py-3 flex align-center hover:bg-gray-100 dark:hover:bg-gray-700">
                        <div class="w-11/12 flex gap-2 text-gray-600 dark:text-gray-400">
                           <div class="grow">
                              <div class="flex align-center mb-1">
                                 <img src="../src/img/profile_image.jpg" class="rounded-full h-4 w-4 mr-2" alt="" srcset="">
                                 <h4 class="text-main text-xs font-medium mb-1"><span class="text-dark ">  <?php echo $row['NameUpload']; ?> </span>•<span class="text-gray-400 italic">  
                                 <?php echo getTimeAgo($row['dateUpload']); ?>
                                 </span></h4>
                              </div>
                              <div class="items-center gap-2 text-main inline-block hover:underline hover:underline-offset-4">
                                 <div class="flex items-center gap-2">
                                    <svg class="w-[16px] h-[16px] dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                                       <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M6 1v4a1 1 0 0 1-1 1H1m14-4v16a.97.97 0 0 1-.933 1H1.933A.97.97 0 0 1 1 18V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 1h8.239A.97.97 0 0 1 15 2Z"/>
                                    </svg>
                                    <!-- FILE LOCATION -->
                                    <a class="" href="../files/<?php echo $row['file']; ?>" target="_blank"><?php echo $row['file']; ?></a>
                                 </div>
                              </div>
                              <div class="mt-2 flex flex-wrap gap-2">
                     
                                 <div class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300"><?php echo $row['subj']; ?></div>
                                 <div class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300"><?php echo $row['subjCode']; ?></div>
                                 <div class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300"><?php echo $row['year']; ?></div>
                                 <div class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300"><?php echo $row['term']; ?></div>
                              
                              </div>
                           </div>
                        </div>
                        <div class="invisible group-hover/main:visible w-1/12 flex gap-2 flex-col justify-center items-center">
                           <!-- ACCEPT -->
                           <form method="POST" action="../php/insert.php" onsubmit="return confirm('Are you sure you want to Accept this?');">
                              <input type="hidden" name="syllabusid" value="<?php echo $row['ID']; ?>">
                              <button name = "accept" class="text-sm font-medium text-main p-1.5 hover:bg-light-200 rounded-lg dark:text-blue-500 dark:hover:bg-gray-700">
                                 <svg class="w-5 h-5 text-main dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                       <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                 </svg>
                              </button>
                           </form>


                        <!-- DECLINE -->
                        <form method="POST" action="../php/insert.php" onsubmit="return confirm('Are you sure you want to decline this?');">
                        <input type="hidden" name="syllabusidec" value="<?php echo $row['ID']; ?>">
                              <button name = "decline" class="text-sm font-medium text-main p-1.5 hover:bg-light-200 rounded-lg dark:text-blue-500 dark:hover:bg-gray-700" href="#">
                                 <svg class="w-5 h-5 text-secondary dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                 <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                 </svg>
                              </button>
                        </form>
                             
                        </div>
                     </div>
                  </li>
                  <?php endforeach; ?>
                  <?php endif; ?>
               <!-- END -->
                  
               </ol>
            </div>
            <div class="self-end mt-auto mx-0 text-end ">
               <a href="../ADMIN/syllabus.php" class="inline-flex items-center font-medium text-main hover:text-red-800">
                  View more
                  <svg class="w-2.5 h-2.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                  </svg>
               </a>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
</body>
</html>