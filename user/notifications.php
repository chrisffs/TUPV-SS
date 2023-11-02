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
<body class="">
<?php 
$page = 'notifications';
include "../php/user_header.php";
?>
<main class="sm:ml-[64px] sm:ml-6 p-4 md:p-6 mt-[60px]">
<?php 
    $sql1 = "( SELECT ID, uploaderId, uploadedby, time_uploaded, Question, 'Accepted' AS status, 'Question' AS type FROM questionbank_tbl WHERE uploaderId = {$_SESSION['ID']} ) UNION ALL ( SELECT ID, uploaderId, uploadedby, time_uploaded, Question, 'Declined' AS status, 'Question' AS type FROM qbdecline_tbl WHERE uploaderId = {$_SESSION['ID']} ) UNION ALL ( SELECT ID, USERUPLOADID, NAMEUPLOAD, DATEUPLOAD, FILES, 'Accepted' AS status, 'Module' AS type FROM syllabus_tbl WHERE USERUPLOADID = {$_SESSION['ID']} ) UNION ALL ( SELECT ID, uploaderId, NameUpload, dateUpload, file, 'Declined' AS status, 'Module' AS type FROM declinedsyllabus_tbl WHERE uploaderId = {$_SESSION['ID']} ) ORDER BY time_uploaded DESC;";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->execute();
    $data1 = $stmt1->fetchAll();
?>
<section class="container mx-auto">
    <div class="mt-6">
        <div class="border-b pb-4 mb-4 ">
            <h1 class="text-xl font-semibold">Notifications</h1>
        </div>
        <?php foreach ($data1 as $row1): 
            if(  $row1['type'] == 'Module') {
                ?>
                <div id="notification_<?php echo $row1['ID']?>" class="target:ring-2 target:rounded-lg flex py-3 px-4 border-b">
                    <div class="flex-shrink-0">
                        <img title="Admin" class="w-11 h-11 rounded-full" src="../files/userpics/default.jpg" alt="Bonnie Green avatar">
                        <div class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 rounded-full border border-white bg-blue-500 dark:border-gray-700">
                            <svg class="w-3 h-3 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 17V2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H3a2 2 0 0 0-2 2Zm0 0a2 2 0 0 0 2 2h12M5 15V1m8 18v-4"/>
                            </svg>
                        </div>
                    </div>
                    <div class="pl-3 w-full">
                        <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400"><?php echo $row1['status']?> your uploaded <?php echo $row1['type']?> <span class="font-semibold text-gray-900 dark:text-white text-truncate"><?php echo $row1['Question']?></span></div>
                        <div class="text-xs font-medium text-primary-700 dark:text-primary-400">
                        <?php
                            date_default_timezone_set('Asia/Manila'); // Set the default timezone to Manila
                            // Get the original timestamp (for example, from a database or any source)
                            $originalTimestamp = strtotime($row1['time_uploaded']); // Replace this with your original timestamp
                            $currentTimestamp = time();

                            $timeDifference = $currentTimestamp - $originalTimestamp;

                            // Convert the time to a human-readable format
                            if ($timeDifference < 60) {
                                echo "Just Now";
                            } elseif ($timeDifference < 3600) {
                                $minutes = floor($timeDifference / 60);
                                echo $minutes . " minute" . ($minutes > 1 ? "s" : "") . " ago";
                            } elseif ($timeDifference < 86400) {
                                $hours = floor($timeDifference / 3600);
                                echo $hours . " hour" . ($hours > 1 ? "s" : "") . " ago";
                            } elseif ($timeDifference < 604800) {
                                $days = floor($timeDifference / 86400);
                                echo $days . " day" . ($days > 1 ? "s" : "") . " ago";
                            } elseif ($timeDifference < 2592000) {
                                $weeks = floor($timeDifference / 604800);
                                echo $weeks . " week" . ($weeks > 1 ? "s" : "") . " ago";
                            } else {
                                $months = floor($timeDifference / 2592000);
                                echo $months . " month" . ($months > 1 ? "s" : "") . " ago";
                            }
                        ?>
                        <!-- <a href="" ></a> -->
                        </div>
                        <div class="mt-4">
                            <object class="h-[500px] w-full border rounded-lg flex justify-center items-center" data="../files/syllabusfiles/<?php echo $row1['Question']?>" type="application/pdf">
                                <p class="p-6 italic text-center">Unable to display PDF file. <a class="underline text-blue-700" target="_blank" href="../files/syllabusfiles/<?php echo $row1['Question']?>">Download</a> instead.</p>
                            </object>
                        </div>
                        <?php 
                        if( $row1['status'] == "Accepted") {
                        $sql1 = "SELECT * FROM `syllabus_tbl` WHERE ID = '".$row1['ID']."'";
                        $stmt1 = $conn->prepare($sql1);
                        $stmt1->execute();
                        $data1 = $stmt1->fetchAll();
                        ?>
                        <?php foreach ($data1 as $row2): ?>
                            <div class="mt-2">
                                <span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"><?php echo $row2['SUBJECTS']?></span>
                                <span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"><?php echo $row2['TERM']?></span>
                                <span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"><?php echo $row2['YEARS']?></span>
                            </div>
                        <?php endforeach; } else ?>

                        <?php 
                        if( $row1['status'] == "Declined") {
                        $sql1 = "SELECT * FROM `declinedsyllabus_tbl` WHERE ID = '".$row1['ID']."'";
                        $stmt1 = $conn->prepare($sql1);
                        $stmt1->execute();
                        $data1 = $stmt1->fetchAll();
                        ?>
                        <?php foreach ($data1 as $row2): ?>
                            <div class="mt-2">
                                <span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"><?php echo $row2['subj']?></span>
                                <span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"><?php echo $row2['term']?></span>
                                <span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"><?php echo $row2['year']?></span>
                            </div>
                        <?php endforeach; }?>
                    </div>
                </div>
                <?php
            } else if ( $row1['type'] == 'Question') {
                ?>
                <div id="notification_<?php echo $row1['ID']?>" class="target:ring-2 target:rounded-lg flex py-3 px-4 border-b">
                    <div class="flex-shrink-0">
                        <img title="Admin" class="w-11 h-11 rounded-full" src="../files/userpics/default.jpg" alt="Jese Leos avatar">
                        <div class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-green-500 rounded-full border border-white dark:border-gray-700">
                            <svg class="w-3 h-3 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.529 7.988a2.502 2.502 0 0 1 5 .191A2.441 2.441 0 0 1 10 10.582V12m-.01 3.008H10M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="pl-3 w-full">
                        <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400"><?php echo $row1['status']?> your submitted <?php echo $row1['type']?> <span class="font-medium text-gray-900 dark:text-white text-truncate">"<?php echo $row1['Question']?>"</span></div>
                        <div class="text-xs font-medium text-primary-700 dark:text-primary-400">
                            <?php
                                date_default_timezone_set('Asia/Manila'); // Set the default timezone to Manila
                                // Get the original timestamp (for example, from a database or any source)
                                $originalTimestamp = strtotime($row1['time_uploaded']); // Replace this with your original timestamp
                                $currentTimestamp = time();

                                $timeDifference = $currentTimestamp - $originalTimestamp;

                                // Convert the time to a human-readable format
                                if ($timeDifference < 60) {
                                    echo "Just Now";
                                } elseif ($timeDifference < 3600) {
                                    $minutes = floor($timeDifference / 60);
                                    echo $minutes . " minute" . ($minutes > 1 ? "s" : "") . " ago";
                                } elseif ($timeDifference < 86400) {
                                    $hours = floor($timeDifference / 3600);
                                    echo $hours . " hour" . ($hours > 1 ? "s" : "") . " ago";
                                } elseif ($timeDifference < 604800) {
                                    $days = floor($timeDifference / 86400);
                                    echo $days . " day" . ($days > 1 ? "s" : "") . " ago";
                                } elseif ($timeDifference < 2592000) {
                                    $weeks = floor($timeDifference / 604800);
                                    echo $weeks . " week" . ($weeks > 1 ? "s" : "") . " ago";
                                } else {
                                    $months = floor($timeDifference / 2592000);
                                    echo $months . " month" . ($months > 1 ? "s" : "") . " ago";
                                }
                            ?>
                        </div>
                        <?php 
                        if( $row1['status'] == "Accepted") {
                        $sql1 = "SELECT * FROM `questionbank_tbl` WHERE ID = '".$row1['ID']."'";
                        $stmt1 = $conn->prepare($sql1);
                        $stmt1->execute();
                        $data1 = $stmt1->fetchAll();
                        ?>
                        <?php foreach ($data1 as $row2): ?>
                            <div class="mt-2">
                                <div class="p-4 md:p-6 space-y-2 border rounded-lg mb-2 text-sm md:text-base hover:shadow-md">
                                    <p class="leading-relaxed font-medium text-gray-900 dark:text-gray-400">
                                    <?php echo $row2['Question']?>
                                    </p>
                                    <ol class="text-gray-600">
                                        <li><span class="font-medium mr-2">a.</span> <span><?php echo $row2['A']?></span></li>
                                        <li><span class="font-medium mr-2">b.</span> <span><?php echo $row2['B']?></span></li>
                                        <li><span class="font-medium mr-2">c.</span> <span><?php echo $row2['C']?></span></li>
                                        <li><span class="font-medium mr-2">d.</span> <span><?php echo $row2['D']?></span></li>
                                    </ol>
                                    <p>Answer: <span><?php echo $row2['Answer']?></span></p>
                                </div>
                                <span class="bg-blue-100 text-blue-800 text-xs md:text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"><?php echo $row2['Year']?></span>
                                <span class="bg-blue-100 text-blue-800 text-xs md:text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"><?php echo $row2['Subject']?></span>
                                <span class="bg-blue-100 text-blue-800 text-xs md:text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"><?php echo $row2['Term']?></span>
                                <span class="bg-blue-100 text-blue-800 text-xs md:text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"><?php echo $row2['Semester']?></span>
                            </div>
                        <?php endforeach; } else ?>

                        <?php 
                        if( $row1['status'] == "Declined") {
                        $sql1 = "SELECT * FROM `qbdecline_tbl` WHERE ID = '".$row1['ID']."'";
                        $stmt1 = $conn->prepare($sql1);
                        $stmt1->execute();
                        $data1 = $stmt1->fetchAll();
                        ?>
                        <?php foreach ($data1 as $row2): ?>
                            <div class="mt-2">
                                <div class="p-4 md:p-6 space-y-2 border rounded-lg mb-2 text-sm md:text-base hover:shadow-md">
                                    <p class="leading-relaxed font-medium text-gray-900 dark:text-gray-400">
                                    <?php echo $row2['Question']?>
                                    </p>
                                    <ol class="text-gray-600">
                                        <li><span class="font-medium mr-2">a.</span> <span><?php echo $row2['A']?></span></li>
                                        <li><span class="font-medium mr-2">b.</span> <span><?php echo $row2['B']?></span></li>
                                        <li><span class="font-medium mr-2">c.</span> <span><?php echo $row2['C']?></span></li>
                                        <li><span class="font-medium mr-2">d.</span> <span><?php echo $row2['D']?></span></li>
                                    </ol>
                                    <p>Answer: <span><?php echo $row2['Answer']?></span></p>
                                </div>
                                <span class="bg-blue-100 text-blue-800 text-xs md:text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"><?php echo $row2['Year']?></span>
                                <span class="bg-blue-100 text-blue-800 text-xs md:text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"><?php echo $row2['Subject']?></span>
                                <span class="bg-blue-100 text-blue-800 text-xs md:text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"><?php echo $row2['Term']?></span>
                                <span class="bg-blue-100 text-blue-800 text-xs md:text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"><?php echo $row2['Semester']?></span>
                            </div>
                        <?php endforeach; }?>
                    </div>
                </div>
                <?php
            }
            ?>
        
        <?php endforeach; ?>
    </div>
</section>

</main>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script>
$(document).ready(function() {
  // Check if the hash exists in the URL
  if(window.location.hash) {
    var target = $(window.location.hash);
    if(target.length) {
      $('html, body').animate({
        scrollTop: target.offset().top - ($(window).height() - target.outerHeight()) / 2
      }, 10);
    }
  }
  
});
</script>
</body>
</html>