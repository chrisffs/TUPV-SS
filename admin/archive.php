<?php 
include '../php/conn.php';
include '../php/session.php';
Include '../php/TIMEAGO.PHP'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../src/img/tupvlogo.png">
    <title>Archive | TUPV Syllabus System</title>
    <link rel="stylesheet" href="../src/css/main.css">
    <link rel="stylesheet" href="../src/css/jquery.dataTables.css">
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
</head>
<body class="bg-light-100">
<?php 
$page = 'archive';
include '../php/header.php' 
?>
<div class="p-2 sm:ml-64 relative">
    <div class="p-4 mt-14">
        <div class="bg-light border border-light-200 rounded-lg h-full p-4">
            <div class="mb-6">
                <h1 class="text-2xl font-semibold">Archive</h1>
                <!-- <h6 class="text-gray-600 leading-tight tracking-tight">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim quasi dignissimos blanditiis quaerat tempora.</h6> -->
            </div>
            <div class="border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg aria-selected:border-main aria-selected:text-main" id="list-tab" data-tabs-target="#list" type="button" role="tab" aria-controls="list" aria-selected="false">Questions (Declined)</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button class="relative inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 aria-selected:border-main aria-selected:text-main" id="pending-tab" data-tabs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="false">
                            Syllabus (Declined)
                        </button>
                    </li>
                </ul>
            </div>
            <div id="myTabContent">
                <div class="hidden pt-4 rounded-lg dark:bg-gray-800" id="list" role="tabpanel" aria-labelledby="list-tab">
                    <div class="relative overflow-x-auto">
                        <table class="archiveTable pt-3 mb-3 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                <th scope="col" class="px-4 py-2 font-medium">
                                Date Archived
                                </th>
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
                            <tbody class="text-gray-900">
                            <?php 
                           $sql = "SELECT * FROM qbdecline_tbl";
                           $stmt = $conn->prepare($sql);
                           $stmt->execute();
                           $data1 = $stmt->fetchAll();   
                           
                           foreach ($data1 as $row):
                        ?> 
                        <tr class="bg-white  border-b dark:bg-gray-800 text-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-4 py-2">
                           <?php 
                                $old_date_timestamp2 = strtotime($row['archiveDate']);
                                $date2 = date('Y/m/d', $old_date_timestamp2);
                                echo $date2;
                                ?>
                                <span class="block text-xs text-gray-600">
                                    <?php 
                                    $time2 = date('g:i A', $old_date_timestamp2);
                                    echo $time2 
                                    ?>
                                </span>
                           </td>
                           <th scope="row" class="px-4 py-2 font-medium whitespace-nowrap dark:text-white">
                           
                              <a data-modal-target="question-modalcheckerDEC" data-modal-toggle="question-modalcheckerDEC" class="text-main underline dark:text-red-500 hover:no-underline cursor-pointer question-showchecker" type="button"
                              data-id="<?php echo $row['id']; ?>"
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
                           <?php echo $row['Term']; ?>
                           </td>
                           <td class="px-4 py-2">
                           <?php echo $row['Semester']; ?>
                           </td>
                           <td class="px-4 py-2">
                           <?php echo $row['uploadedby']; ?>
                           </td>
                           <td class="px-4 py-2">
                           <?php 
                                $old_date_timestamp1 = strtotime($row['time_uploaded']);
                                $date1 = date('Y/m/d', $old_date_timestamp1);
                                echo $date1;
                                ?>
                                <span class="block text-xs text-gray-600">
                                    <?php 
                                    $time1 = date('g:i A', $old_date_timestamp1);
                                    echo $time1 
                                    ?>
                                </span>
                           </td>
                           <td class="px-4 py-2">
                              <div class="inline-block">
                                 <div class="inline-block mr-2">
                                 <form method="POST" action="../php/insert.php" onsubmit="return confirm('Are you sure you want to Restore this?');">
                              <input type="hidden" name="resqbid" value="<?php echo $row['id']; ?>">
                                    <button name = "restoreqb" class="font-medium text-main dark:text-blue-500 hover:underline">Restore</button>
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

            

                <!-- SYLLABUS START -->

                <div class="hidden pt-4 rounded-lg dark:bg-gray-800" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                <div class="relative overflow-x-auto">
                        <table id="qBankPendingTable" class="syllabusTable pt-3 mb-3 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        Date Archived
                                    </th>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        FILE NAME
                                    </th>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        SUBJECT
                                    </th>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        SUBJECT CODE
                                    </th>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        TERM
                                    </th>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        YEAR
                                    </th>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        UPLOADED BY
                                    </th>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        DATE UPLOADED
                                    </th>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        ACTION
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-900">
                            <?php 
                           $sql = "SELECT * FROM declinedsyllabus_tbl";
                           $stmt = $conn->prepare($sql);
                           $stmt->execute();
                           $data1 = $stmt->fetchAll();   
                           
                           foreach ($data1 as $row):
                        ?> 
                                <tr class="bg-white border-b  dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-4 py-2">
                                    <?php 
                                        $old_date_timestamp3 = strtotime($row['archiveDate']);
                                        $date3 = date('Y/m/d', $old_date_timestamp3);
                                        echo $date3;
                                        ?>
                                        <span class="block text-xs text-gray-600">
                                            <?php 
                                            $time3 = date('g:i A', $old_date_timestamp3);
                                            echo $time3 
                                            ?>
                                        </span>
                                    </td>
                                    <td class="px-4 py-2 whitespace-wrap">
                                        <a class="text-main hover:underline hover:underline-offset-4 " href="../files/<?php echo $row['file']; ?>" target="_blank"><?php echo $row['file']; ?></a>
                                    </td>
                                    <th scope="row" class="px-4 py-2 font-normal  whitespace-wrap dark:text-white">
                                    <?php echo $row['subj']; ?>
                                    </th>
                                    <td class="px-4 py-2">
                                    <?php echo $row['subjCode']; ?>
                                    </td>
                                    <td class="px-4 py-2">
                                        <?php echo $row['term']; ?>
                                    </td>
                                    <td class="px-4 py-2">
                                        <?php echo $row['year']; ?>
                                    </td>
                                    <td class="px-4 py-2">
                                    <?php echo $row['NameUpload']; ?>	
                                    </td>
                                    <td class="px-4 py-2">
                                    <?php 
                                        $old_date_timestamp4 = strtotime($row['dateUpload']);
                                        $date4 = date('Y/m/d', $old_date_timestamp4);
                                        echo $date4;
                                        ?>
                                        <span class="block text-xs text-gray-600">
                                            <?php 
                                            $time4 = date('g:i A', $old_date_timestamp4);
                                            echo $time4 
                                            ?>
                                        </span>
                                    </td>
                                    <td class="px-4 py-2">
                                        <div class="inline-block">
                                        <form method="POST" action="../php/insert.php" onsubmit="return confirm('Are you sure you want to Restore this?');">
                                    <input type="hidden" name="ressysid" value="<?php echo $row['ID']; ?>">
                                            <button name = "restoresys" class="font-medium text-main dark:text-blue-500 hover:underline">Restore</button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php 
                include "../php/modal.archive.php"
                ?>
            </div>
            
        </div>
    </div>
</div>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
<script src="../src/js/archive.js"></script>
<script src="../src/js/jquery.dataTables.js"></script>
</body>
</html>