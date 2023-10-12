<?php
include '../db/conn.php';
session_start();
// For verifying if the form method is POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("POST request method required");
}
if(isset($_POST['submit'])) {
// Finding out the error for the file upload
if ($_FILES["file"]["error"] !== UPLOAD_ERR_OK) {
    switch ($_FILES["file"]["error"]) {
        case UPLOAD_ERR_PARTIAL;
            exit("File only partially uploaded");
            break;
        case UPLOAD_ERR_NO_FILE:
            exit("No file was uploaded");
            break;
        case UPLOAD_ERR_EXTENSION:
            exit("File upload stopped by a PHP Extension");
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            exit("Temporary folder not found");
            break;
        case UPLOAD_ERR_CANT_WRITE:
            exit("Failed to write file");
            break;
        // case UPLOAD_ERR_FORM_SIZE:
        //     exit("File exceeds MAX_FILE_SIZE in the HTML form");
        //     break;
        default:
            exit("Unknown upload error");
            break;
    }
}

// checking the file info
$finfo = new finfo(FILEINFO_MIME_TYPE);
$mime_type = $finfo->file($_FILES["file"]["tmp_name"]);

// exit($mime_type); 

// Allowed file types array
$mime_types = ["application/pdf", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.openxmlformats-officedocument.presentationml.presentation"];
// Verifying if the file is in pdf, docx, ppt
if (! in_array($_FILES["file"]["type"], $mime_types)) {
    exit("Invalid file type");
}

$pathinfo = pathinfo($_FILES["file"]["name"]);
$base = $pathinfo["filename"];
$base = preg_replace("/[^\w-]/", "_", $base);
$filename = $base . "." . $pathinfo["extension"];


// Transfering file to a folder
$filename = $_FILES["file"]["name"];
$destination = __DIR__ . "/../db/uploaded_files/" . $filename;

$i = 1;

while (file_exists($destination)) {
    $filename = $base . "($i)." . $pathinfo["extension"];
    $destination = __DIR__ . "/../db/uploaded_files/" . $filename;

    $i++;
}
if (! move_uploaded_file($_FILES["file"]["tmp_name"], $destination)) {
    exit("Can't move uploaded file");
}

// For Maximum file size
if ($_FILES["file"]["size"] > 1048567) {
    exit("File exceeds max(1MB)");
}

    $dept = $_POST['department'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $semester = $_POST['semester'];
    $term = $_POST['term'];
    $subject = $_POST['subject'];
    $subject_code = $_POST['subject_code'];
    $week_no = $_POST['week_no'];
    $uploadedBy = $_SESSION['full_name'];
    $fname = $filename;
    $fileloc = realpath("../db/uploaded_files/" . $filename);
    $date_uploaded = $d = date("Y-m-d");


    $query = "INSERT INTO syllabusdb (DEPT, COURSE, YEAR, SEMESTER, TERM, SUBJECT_NAME, SUBJECT_CODE, WEEK_NO, UB, FILENAME, FILELOC, DATE_UPLOADED ) VALUES ('$dept', '$course', ' $year', '$semester', '$term', '$subject', '$subject_code' , '$week_no', '$uploadedBy', '$fname', '$fileloc', '$date_uploaded')";

    $query_run = mysqli_query($conn, $query);
    if($query_run) { 
        $_SESSION['message'] = "Module Uploaded Successfully";
        header("Location: file_upload.php"); 
        exit(0);
    }       
    else {
        $_SESSION['message'] = "Module Upload Failed";
        header("Location: file_upload.php"); 
        exit(0); 
    }
}
print_r($_FILES);
?>