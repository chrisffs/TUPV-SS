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
    <title>Exam Checker | TUPV Syllabus System</title>
</head>
<body>
<?php 
$page = 'examchecker';
include "../php/user_header.php";
?>

<!-- EXAM CHECKER CONTENT HERE FROM ALDRICH -->

<main class="sm:ml-[64px] sm:ml-6 p-4 lg:p-6 mt-[60px]">
    <div class="flex flex-col md:flex-row md:divide-x">
        <div class="p-0 md:pr-4 lg:pr-6 md:w-2/3 h-full">
            <form id="checkExam" method="post" action="../php/check_exam.php" enctype="multipart/form-data" class="border rounded-lg p-4 lg:p-6">
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
                        <input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['ID']?>" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                </div>
                <div class="flex items-center justify-end p-2 border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit" value="Submit" name="insertfile" class="text-white bg-main hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-blue-800">Upload File</button>
                </div>
            </form>
        </div>
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
    
});
</script>
</body>
</html>