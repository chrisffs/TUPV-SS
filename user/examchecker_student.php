<?php 
include '../php/conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/main.css">
    <link rel="icon" href="../src/img/tupvlogo.png">
    <title>Exam Checker | TUPV Syllabus System</title>
</head>
<body>

<!-- EXAM CHECKER CONTENT HERE FROM ALDRICH -->

<main class="sm:ml-[64px] sm:ml-6 p-4 lg:p-6 mt-[60px]">
    <div class="flex flex-col md:flex-row md:divide-x">
        <div class="p-0 md:pr-4 lg:pr-6 w-full h-full">
            <form id="checkExam" method="post" action="../php/check_exam2.php" enctype="multipart/form-data" class="border rounded-lg p-4 lg:p-6">
                <div class="text-2xl mb-6 font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Upload File to Check Your Exam
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">*Instructions to check the exam</p>
                </div>
                <div class="grid gap-2 md:gap-4 grid-cols-4 content-end">
                    <div class="col-span-4 sm:col-span-1">
                        <label for="exam-code" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Unique Exam Code</label>
                        <input type="text" id="exam-code" name="exam-code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div class="flex items-center justify-center mt-4 col-span-4">
                        <label for="fileupload_user" id="fileupload-container" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Image File</p>
                            </div>
                            <input id="fileupload_user" name="fileupload_user" type="file" class="hidden"/>

                            <div id="file-name" class="hidden mt-2 text-gray-500 dark:text-gray-400"></div>
                        </label>
                    </div> 
                    <div class="col-span-4">
                        <input type="hidden" name="userid" id="userid" value="student" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                </div>
                <div class="flex items-center justify-end p-2 border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit" value="Submit" name="checkExam" class="text-white bg-main hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-blue-800">Upload File</button>
                </div>
            </form>
        </div>
        <!-- <aside class="py-6 pl-4 lg:pl-6 md:w-1/3">
            <div class="h-full">
                <div class="mb-4">
                    <h1 class="text-xl font-semibold">Pending</h1>
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Wait for the admin to accept these files and be displayed at the Syllabus.</p>
                </div>
                <div>
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700 border-y ">
                        <?php
                            $sql = "SELECT * FROM `exammaker_tbl` WHERE uploaderId = {$_SESSION['ID']} ORDER BY dateUpload desc";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $subjects1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <?php 
                        if (count($subjects1) == 0) {
                            ?> 
                            <li class="py-3 sm:py-4 px-4 text-center text-gray-500">
                                <h1>No Pending Files.</h1>
                            </li>
                            <?php
                        } else {
                        foreach ($subjects1 as $row): 
                        ?>

                        <li class="py-3 sm:py-4 px-4 hover:bg-gray-100">
                            <a href="../admin/Examprint.php?uniquecode=<?php echo $row['uniquecode']; ?>&Term=<?php echo $row['Term']; ?>&Subj=<?php echo $row['Subj']; ?>&Semester=<?php echo $row['Semester']; ?>" target="_blank">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0 ">
                                        <svg class="w-6 h-6 text-gray-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                                        </svg>

                                    </div>
                                    <div class="min-w-0">
                                        <p class="text-sm font-medium text-gray-600 truncate dark:text-white">
                                            <?php echo $row['uniquecode'];?>
                                        </p>
                                        <p class="text-xs text-gray-500 truncate dark:text-gray-400">
                                            <?php echo $row['items'];?> Items
                                        </p>  
                                    </div>
                                    <div class="flex-1 inline-flex gap-2 items-center text-base">
                                        <p class="text-sm font-medium text-gray-600 truncate dark:text-white">
                                            <?php echo $row['Subj'];?>
                                        </p>
                                        <p class="text-xs text-gray-500 truncate dark:text-gray-400">
                                            <?php echo $row['Term'];?>
                                        </p>  
                                        <p class="text-xs text-gray-500 truncate dark:text-gray-400">
                                            <?php echo $row['Semester'];?>
                                        </p>  
                                    </div>
                                </div>
                            </a>
                        </li>
                        <?php endforeach; }?>
                    </ul>
                </div>
            </div>
        </aside> -->
    </div>
</main>


<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('.text-truncate').each(function() {
        const text = $(this).text();
        const truncated = text.split(' ').slice(0, 5).join(' '); // Get the first 20 words
        $(this).text(truncated + '...'); // Display truncated text with ellipsis
    });
    function redirectToExamPrint(uniquecode, term, subj, semester) {
    // Redirect to examprint.php with the data
    window.location.href = `./Examprint.php?uniquecode=${uniquecode}&Term=${term}&Subj=${subj}&Semester=${semester}`;
}
    
});
</script>
</body>
</html>