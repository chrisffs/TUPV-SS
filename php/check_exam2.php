<?php

include 'conn.php';
session_start();

if (isset($_POST['checkExam'])) {
    
    // Extract user ID and generate a unique image name
    $user_id = $_POST['userid'];
    $image_name = "img-" . $user_id . "-" . time();

    // Set up the destination folder and file path
    $upload_dir = "../orm/useruploads/";
    $extension = pathinfo($_FILES["fileupload_user"]["name"], PATHINFO_EXTENSION);
    
    $filename = $image_name . "." . $extension;
    $image_path = $upload_dir . $filename;

    // Ensure the destination directory exists
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Move the uploaded file to the specified destination
    if (move_uploaded_file($_FILES["fileupload_user"]["tmp_name"], $image_path)) {
        // File uploaded successfully
        "File uploaded successfully.";
    } else {
        // Handle the case when file movement fails
        "Can't move uploaded file.";
    }
    try {
    $exam_code = $_POST['exam-code'];
    // Use prepared statement to prevent SQL injection
    $sql = "SELECT * FROM `answers_tbl` WHERE uc = :exam_code";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':exam_code', $exam_code, PDO::PARAM_STR);
    $stmt->execute();

    // Fetch all rows
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Iterate through the rows
    foreach ($rows as $row) {
        // Access individual columns using $row['column_name']
        $column1 = $row['ans'];
        $answer_key = str_replace(", ", " ", $column1);
        // Add more columns as needed...

        // Process the data or perform any other actions here
        // echo "Column 1: $answer_key, Column 2: $column2<br>";
    
    
    // Connect to the database to get the answer key and bubble options, use the exam code
    // Temporary Data
    $bubble_options = 4;
    // $answer_key = "3 3 3 3 3 2 1 3 2 3 3 2 3 3 2 2 2 4 1 1";
    $python_script = "python ../orm/omrscanner.py \"$image_path\" \"$answer_key\" $bubble_options $image_name";
     
    $python_script;
  
    // Execute the Python script and capture the output
    $output = shell_exec($python_script);

    $result = json_decode($output, true);

    "Result: \n";
    // print_r($result);
    ?> 
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../src/css/main.css">
        <link rel="icon" href="../src/img/tupvlogo.png">
    </head>
    <body>
    <main class="p-4 lg:p-6 ">
        <div class="flex flex-col md:flex-row md:divide-x">
            <div class="p-0 md:pr-4 lg:pr-6 md:w-1/3 h-full">
                <div class="pb-4 border-b">
                    <h1 class="text-xl font-semibold">Test Paper Result</h1>
                    <!-- <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400"></p> -->
                </div>
                <?php 
                 if (isset($result["correct_answers"], $result["total_items"], $result["wrong_answers"])) {
                ?>
                <div class="mx-auto flex flex-col divide-y">
                   <p class="font-bold py-4"><span class="font-semibold text-green-600">Correct Answers:</span> <?= $result["correct_answers"] ?></p>
                   <p class="font-bold py-4"><span class="font-semibold text-blue-600">Total Items:</span> <?= $result["total_items"] ?></p>
                   <p class="font-bold py-4"><span class="font-semibold text-red-600">Wrong Answers:</span> <?= $result["wrong_answers"] ?></p>
                </div>
                <?php 

                } else {
                    // Handle the case where expected keys are not present in $result
                    echo "Image not Clear, Please try";
                }
                ?>
                <div>
                    <div class="py-4 mb-2 border-y">
                        <h1 class="text-xl font-semibold">Key Answers</h1>
                        <!-- <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400"></p> -->
                    </div>
                    <?php 
                        // Use prepared statement to prevent SQL injection
                        $sql = "SELECT * FROM `generatedquestions_tbl` WHERE UniqueCode = :uniquecode";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':uniquecode', $exam_code, PDO::PARAM_STR);
                        $stmt->execute();

                        // Fetch all rows
                        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        $i = 1;
                        foreach ($rows as $row) {
                    ?>

                    <p><?= $i?>. <?= $row['Answer'];?></p>
                    <?php 
                    $i++;
                        }

                    ?>
                </div>
            </div>
            <aside class="py-6 pl-4 lg:pl-6 md:w-2/3">
                
                <div class="mx-auto">
                    <img class="object-cover mx-auto" src="../php/outputs/<?= $result["img"] ?>.png" alt="">
                </div>
            </aside>
        </div>
    </main>
    <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
    <script src="../node_modules/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    </body>
    </html>
    <?php
    
    } 
    // Update the database
    // Use the result
    // header('location: ../user/examchecker.php');
} catch (Exception $e) {
    // Handle the exception
    echo "An error occurred: " . $e->getMessage();
}
}
//     // Use prepared statement to prevent SQL injection
//     $sql = "SELECT * FROM `answers_tbl` WHERE uc = :exam_code";
//     $stmt = $conn->prepare($sql);
//     $stmt->bindParam(':exam_code', $exam_code, PDO::PARAM_STR);
//     $stmt->execute();

//     // Fetch all rows
//     $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

//     // Iterate through the rows
//     foreach ($rows as $row) {
//         // Access individual columns using $row['column_name']
//         $column1 = $row['ans'];
//         $answer_key = str_replace(", ", " ", $column1);
//         $column2 = $row['id'];
//         // Add more columns as needed...

//         // Process the data or perform any other actions here
//         echo "Column 1: $answer_key, Column 2: $column2<br>";
    
    
//     // Connect to the database to get the answer key and bubble options, use the exam code
//     // Temporary Data
//     $bubble_options = 4;
//     // $answer_key = "3 3 3 3 3 2 1 3 2 3 3 2 3 3 2 2 2 4 1 1";

//     $python_script = "python ../orm/omrscanner.py \"$image_path\" \"$answer_key\" $bubble_options $image_name";

//     echo $python_script;
//     // Execute the Python script and capture the output
//     $output = shell_exec($python_script);

//     $result = json_decode($output, true);

//     echo "Result: \n";
//     print_r($result);
// }
?>
