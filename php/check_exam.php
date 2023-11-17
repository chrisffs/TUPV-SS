<?php

// Upload the image 

// Connect to the database to get the answer key and bubble options, use the exam code

// Temporary Data
$bubble_options = 4;
$image_path = "../orm/test.png"; // Replace with the actual image path
$answer_key = "3 3 3 3 3 2 1 3 2 3 3 2 3 3 2 2 2 4 1 1";
$image_name = "img-test2"; // Change with name or code

$python_script = "python ../orm/omrscanner.py \"$image_path\" \"$answer_key\" $bubble_options $image_name";

// Execute the Python script and capture the output
$output = shell_exec($python_script);

$result = json_decode($output, true);

echo "Result: \n";
print_r($result);

// Update the database
// Use the result
// header('location: ../user/examchecker.php');
?>
