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
        echo "File uploaded successfully.";
    } else {
        // Handle the case when file movement fails
        echo "Can't move uploaded file.";
    }

    $exam_code = $_POST['exam-code'];
    
    // Connect to the database to get the answer key and bubble options, use the exam code
    // Temporary Data
    $bubble_options = 4;
    $answer_key = "3 3 3 3 3 2 1 3 2 3 3 2 3 3 2 2 2 4 1 1";

    $python_script = "python ../orm/omrscanner.py \"$image_path\" \"$answer_key\" $bubble_options $image_name";

    echo $python_script;
    // Execute the Python script and capture the output
    $output = shell_exec($python_script);

    $result = json_decode($output, true);

    echo "Result: \n";
    print_r($result);

    // Update the database
    // Use the result
    // header('location: ../user/examchecker.php');
}

?>
