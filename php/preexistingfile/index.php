<?php 
include '../../../php/conn.php';
include '../../../php/user_session.syllabusfiles.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../src/css/main.css">
    <link rel="icon" href="../../../src/img/tupvlogo.png">
    <title>Syllabus | TUPV Syllabus System</title>
</head>
<body>
<?php 
$page = 'syllabus';
include "../../../php/user_header.syllabusfiles.php";
$DEPT = basename(dirname(__FILE__));
?>
<main class="sm:ml-[64px] sm:ml-6 p-4 md:p-6 mt-[60px]">
    <div class="block space-y-2 sm:flex items-center justify-between pb-4 border-b"> 
      <div class="flex items-center gap-2"> 
        <a href="../../" class="font-semibold text-lg sm:text-2xl">
            Subjects
        </a>
        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"/>
        </svg>
        <a href="./" class="font-semibold text-lg sm:text-2xl">
            <?php echo $DEPT; ?>
        </a>
      </div>
      <div>
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="text" id="filter" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search...">
        </div>
      </div>
    </div>
    <div class="mt-6">
        <div class="relative overflow-x-auto sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-secondary bg-gray-100">
                    <tr>
                        <th scope="col" class="font-medium px-4 py-3">
                            <p class="hidden md:block">File Name</p>
                            <p class="block md:hidden">Files</p>
                        </th>
                        <th scope="col" class="hidden md:table-cell font-medium px-4 py-3">
                            Uploader
                        </th>
                        <th scope="col" class="hidden md:table-cell font-medium px-4 py-3">
                            Date Uploaded
                        </th>
                    </tr>
                </thead>
                <tbody id="files">
                    <?php 
                        $sql = "SELECT s.FILES, a.full_name, s.DATEUPLOAD, a.user_picture FROM syllabus_tbl s INNER JOIN accounts_tbl a ON s.USERUPLOADID = a.ID WHERE s.CODE = '$DEPT' ORDER BY s.FILES ASC";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $data = $stmt->fetchAll();

                        foreach ($data as $row):
                    ?>
                    <tr data-href="../../../files/syllabusfiles/<?php echo $row['FILES'];?>" class="clickable text-gray-600 cursor-pointer bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-4 py-2 text-sm font-normal">
                            <div class="flex gap-2 items-center">
                                <div>
                                    <svg class="w-[16px] h-[16px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M6 1v4a1 1 0 0 1-1 1H1m14-4v16a.97.97 0 0 1-.933 1H1.933A.97.97 0 0 1 1 18V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 1h8.239A.97.97 0 0 1 15 2Z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h1><?php echo $row['FILES'];?></h1>
                                </div>
                            </div>
                            <div class="md:hidden text-xs flex justify-between mt-2">
                                <div class="flex gap-2 items-center">
                                    <div class="w-4 h-4">
                                        <img class="rounded-full w-4 h-4 object-cover" src="../../../files/userpics/<?php echo $row['user_picture'];?>" alt="">
                                    </div>
                                    <div>
                                        <h2><?php echo $row['full_name'];?></h2>
                                    </div> 
                                </div> 
                                <div>
                                    <?php 
                                        $old_date_timestamp = strtotime($row['DATEUPLOAD']);
                                        $date = date('Y/m/d', $old_date_timestamp);
                                        echo $date;
                                    ?>
                                    <span class="text-gray-400">
                                        <?php 
                                        $time = date('g:i A', $old_date_timestamp);
                                        echo $time 
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </th>
                        <td class="px-4 py-2 hidden md:table-cell">
                            <div class="flex gap-2 items-center">
                                <div class="w-6 h-6">
                                    <img class="rounded-full w-6 h-6 object-cover" src="../../../files/userpics/<?php echo $row['user_picture'];?>" alt="">
                                </div>
                                <div>
                                    <h2><?php echo $row['full_name'];?></h2>
                                </div> 
                            </div> 
                        </td>
                        <td class="px-4 py-2 text-xs hidden md:table-cell">
                            <?php 
                                $old_date_timestamp = strtotime($row['DATEUPLOAD']);
                                $date = date('Y/m/d', $old_date_timestamp);
                                echo $date;
                            ?>
                            <span class="block text-gray-400">
                                <?php 
                                $time = date('g:i A', $old_date_timestamp);
                                echo $time 
                                ?>
                            </span>
                        </td>
                    </tr>
                    <?php 
                        endforeach; 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<script src="../../../node_modules/flowbite/dist/flowbite.min.js"></script>
<script src="../../../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../../../src/js/user_syllabus_files.js"></script>
</body>
</html>
