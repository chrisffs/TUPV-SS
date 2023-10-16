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
    <link rel="stylesheet" href="../src/css/main.css">
    <title>Syllabus | TUPV Syllabus System</title>
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
   <?php 
    include "../php/success.insert.syllabus.php"
    ?>
      <div class="bg-light border border-light-200 rounded-lg h-full px-4 pb-4 pt-2">
        <div class="border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
               <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg aria-selected:border-main aria-selected:text-main" id="list-tab" data-tabs-target="#list" type="button" role="tab" aria-controls="list" aria-selected="false">Syllabus List</button>
               </li>

                <?php
                $sql = "SELECT COUNT(ID)`ID` FROM syllabuschecker_tbl";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetch(); // Use fetch instead of fetchAll
                
                if ($result) {
                    $qty25 = $result['ID'];
                } else {
                    $qty25 = 0; // Handle the case when no rows are returned
                }
                ?>
               <li class="mr-2" role="presentation">
                    <button class="relative inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 aria-selected:border-main aria-selected:text-main" id="pending-tab" data-tabs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="false">
                    Pending
                    <span class="bg-red-200 text-xs font-medium text-red-800 text-center p-1 leading-none rounded-full px-2 dark:bg-blue-900 dark:text-blue-200 ml-1 <?php if($qty25 == 0) {echo 'hidden';}?>"><?php echo $qty25; ?></span>
                    </button>
               </li>
            </ul>
        </div>

        <?php
                $sql = "SELECT COUNT(id)`id` FROM syllabus_tbl";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetch(); // Use fetch instead of fetchAll
                
                if ($result) {
                    $qty23 = $result['id'];
                } else {
                    $qty23 = 0; // Handle the case when no rows are returned
                }

        ?>
        <div id="myTabContent">
            <?php 
            include "../php/modal.syllabus.php";
            ?>
            <div class="hidden pt-4 rounded-lg dark:bg-gray-800" id="list" role="tabpanel" aria-labelledby="list-tab">
                <div>
                    <div class="mb-6 flex justify-between">
                        <div>
                            <h1 class="leading-tight tracking-tight text-2xl font-bold">Files List</h1>
                            <h2 class="text-sm font-medium">Total number of Files: <span class="text-main"><?php echo $qty23; ?></span></h2>
                        </div>
                        <div>
                            <button data-modal-target="uploadFileSyllabus-modal" data-modal-toggle="uploadFileSyllabus-modal" type="button" class="flex gap-2 text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                Upload File 
                                <svg class="w-[16px] h-[16px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 19">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15h.01M4 12H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-3m-5.5 0V1.07M5.5 5l4-4 4 4"/>
                                </svg>
                                </svg>
                            </button>
                        </div>
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
                                        $sql = "SELECT * FROM syllabus_tbl  ";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute();
                                        $data = $stmt->fetchAll();     
                                    ?>
                                    <?php foreach ($data as $row): ?>
                                    <tr class="bg-white border-b dark:bg-gray-800 text-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row" class="px-4 py-2 font-medium dark:text-white">
                                            <a class="text-main hover:underline hover:underline-offset-4" href="../files/syllabusfiles/<?php echo $row['FILES']; ?>" target="_blank"><?php echo $row['FILES']; ?></a>
                                            
                                        </th>
                                        <td class="px-4 py-2">
                                        <?php echo $row['SUBJECTS']; ?>
                                        </td>
                                
                                        <td class="px-4 py-2">
                                        <?php echo $row['TERM']; ?>
                                        </td>
                                        <td class="px-4 py-2">
                                        <?php echo $row['NAMEUPLOAD']; ?>
                                        </td>
                                        <td class="px-4 py-2">
                                            <?php 
                                            $old_date_timestamp = strtotime($row['DATEUPLOAD']);
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
                                                <a href="../php/delete.php?id=<?php echo $row['id']; ?>&delsyl=true" onclick="return confirm('Are you sure you want to delete this item?');" class="font-medium text-main dark:text-blue-500 hover:underline">Remove</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden pt-4 rounded-lg dark:bg-gray-800" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                <div>
                <?php 
                  $sql = "SELECT * FROM syllabuschecker_tbl  ";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  $data = $stmt->fetchAll();




               ?>
                    <div class="mb-6">
                        <h1 class="leading-tight tracking-tight text-2xl font-bold">Pending List</h1>
                        <h2 class="text-sm font-medium">Total number of Pending Files: <span class="text-main"><?php echo $qty25; ?></span></h2>
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
                                            Subject Code
                                        </th>
                        
                                        <th scope="col" class="px-4 py-2 font-medium">
                                            Term
                                        </th>
                                        <th scope="col" class="px-4 py-2 font-medium">
                                            Year
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
                                      <!-- START -->
                
                                </thead>
                                <?php 
                                        $sql = "SELECT * FROM syllabuschecker_tbl  ";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute();
                                        $data = $stmt->fetchAll();     
                                    ?>
                                    <?php foreach ($data as $row): ?>
                                <tbody>
                                    <tr class="bg-white border-b dark:bg-gray-800 text-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row" class="px-4 py-2 font-medium whitespace-nowrap dark:text-white">
                                            <a class="text-main hover:underline hover:underline-offset-4" href="../files/ECON-Learning-Content.pdf" target="_blank"><?php echo $row['file']; ?></a>
                                        </th>
                                        <td class="px-4 py-2">
                                        <?php echo $row['subj']; ?>
                                        </td>
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
                                            $old_date_timestamp = strtotime($row['dateUpload']);
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
                                            
                                            <div class="inline-block mr-2">
                                             <!-- ACCEPT -->
                                            <form method="POST" action="../php/insert.php" onsubmit="return confirm('Are you sure you want to Accept this?');">
                                                <input type="hidden" name="syllabusid" value="<?php echo $row['ID']; ?>">
                                                <button name="accept1" class="font-medium text-blue-600 dark:text-blue-500            hover:underline">Accept</button>
                                            </form>
                                            </div>


                                            <!-- DECLINE -->
                                            <div class="inline-block">
                                            <form method="POST" action="../php/insert.php" onsubmit="return confirm('Are you sure you want to decline this?');">
                                            <input type="hidden" name="syllabusidec" value="<?php echo $row['ID']; ?>">
                                                <button name = "decline1" href="#" class="font-medium text-main dark:text-blue-500 hover:underline">Decline</button>
                                            </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
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
        $('.syllabusTable').DataTable({
        "ordering": false,
        "lengthChange": false,
        "info": false,
        // columnDefs: [ {
        //     targets: 0,
        //     render: DataTable.render.ellipsis( 40, true )
        // } ]
        });

        $('#fileSubject').change(function () {
            const selectedSubject = $(this).val();
            const subjectCodeDropdown = $('#subjectCode');

            // subjectCodeDropdown.html('<option selected disabled hidden value="">Loading...</option>');

            // Convert the PHP subject data to a JavaScript object
            const subjectCodeData = <?php echo json_encode($subjects); ?>;

            const selectedSubjectCode = subjectCodeData.find(subject => subject.subjectName === selectedSubject);

            if (selectedSubjectCode) {
                subjectCodeDropdown.val(selectedSubjectCode.subjCode);
            } else {
                subjectCodeDropdown.val('No subject code found');
            }
        });
        setTimeout(function() {
        $(".alert").addClass("hidden"); // Add the 'hidden' class to hide the element
        }, 3000);
    });
</script>
<script src="../src/js/jquery.dataTables.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.13.6/dataRender/ellipsis.js"></script>
</body>