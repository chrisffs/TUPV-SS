<?php
include 'conn.php';
session_start();
// For verifying if the form method is POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("POST request method required");
}
if(isset($_POST['insertfile'])) {
// Finding out the error for the file upload
if ($_FILES["file"]["error"] !== UPLOAD_ERR_OK) {
    switch ($_FILES["file"]["error"]) {
        case UPLOAD_ERR_PARTIAL;
            $_SESSION['uploadfile_message'] = "File only partially uploaded";
            header('location: ../admin/syllabus.php');
            $_SESSION['uploadfile_messagecolor'] = "red";
            exit();
            break;
        case UPLOAD_ERR_NO_FILE:
            $_SESSION['uploadfile_message'] = "No file was uploaded";
            header('location: ../admin/syllabus.php');
            $_SESSION['uploadfile_messagecolor'] = "red";
            exit();
            break;
        case UPLOAD_ERR_EXTENSION:
            $_SESSION['uploadfile_message'] = "File upload stopped by a PHP Extension";
            header('location: ../admin/syllabus.php');
            $_SESSION['uploadfile_messagecolor'] = "red";
            exit();
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            $_SESSION['uploadfile_message'] = "Temporary folder not found";
            header('location: ../admin/syllabus.php');
            $_SESSION['uploadfile_messagecolor'] = "red";
            exit();
            break;
        case UPLOAD_ERR_CANT_WRITE:
            $_SESSION['uploadfile_message'] = "Failed to write file";
            header('location: ../admin/syllabus.php');
            $_SESSION['uploadfile_messagecolor'] = "red";
            exit();
            break;
        default:
            $_SESSION['uploadfile_message'] = "Unknown upload error";
            header('location: ../admin/syllabus.php');
            $_SESSION['uploadfile_messagecolor'] = "red";
            exit();
            break;
    }
}

// // checking the file info
// $finfo = new finfo(FILEINFO_MIME_TYPE);
// $mime_type = $finfo->file($_FILES["file"]["tmp_name"]);

// exit($mime_type); 

// // Allowed file types array
$mime_types = ["application/pdf", "application/vnd.openxmlformats-officedocument.presentationml.presentation"];
// Verifying if the file is in pdf, docx, ppt
if (! in_array($_FILES["file"]["type"], $mime_types)) {
    
    $_SESSION['uploadfile_message'] = "Invalid file type";
    $_SESSION['uploadfile_messagecolor'] = "red";
    header('location: ../admin/syllabus.php');
    exit();
}

// For Maximum file size
if ($_FILES["file"]["size"] > 10485760) {
    $_SESSION['uploadfile_message'] = "File exceeds max(10MB)";
    $_SESSION['uploadfile_messagecolor'] = "red";
    header('location: ../admin/syllabus.php');
    exit();
}

$pathinfo = pathinfo($_FILES["file"]["name"]);
$base = $pathinfo["filename"];
$base = preg_replace("/[^\w-]/", "_", $base);
$filename = $base . "." . $pathinfo["extension"];

// Transfering file to a folder
$filename = $_FILES["file"]["name"];
$destination = __DIR__ . "/../files/syllabusfiles/" . $filename;

$i = 1;

while (file_exists($destination)) {
    $filename = $base . "($i)." . $pathinfo["extension"];
    $destination = __DIR__ . "/../files/syllabusfiles/" . $filename;

    $i++;
}
if (! move_uploaded_file($_FILES["file"]["tmp_name"], $destination)) {
    $_SESSION['uploadfile_message'] = "Can't move uploaded file";
    $_SESSION['uploadfile_messagecolor'] = "red";
    header('location: ../admin/syllabus.php');
    exit();
}
    $fileyear = $_POST['fileYear'];
    $fileterm = $_POST['fileTerm'];
    $filesubject = $_POST['fileSubject'];
    $subjectcode = $_POST['subjectCode'];
    $uploadedBy = $_SESSION['full_name'];
    $fname = $filename;
    $fileloc = realpath("../files/syllabusfiles/" . $filename);
    $date_uploaded = $d = date("Y-m-d H:i:s");
    
    // Prepare the SQL statement
    $sql = "INSERT INTO syllabus_tbl (NAMEUPLOAD, SUBJECTS, CODE, TERM, YEARS, FILES, FILELOC) VALUES (:uploadername, :subject, :subject_code, :term, :year, :filename, :filelocation)";

    $stmt = $conn->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(':uploadername', $uploadedBy);
    $stmt->bindParam(':subject', $filesubject);
    $stmt->bindParam(':subject_code', $subjectcode);
    $stmt->bindParam(':term', $fileterm);
    $stmt->bindParam(':year', $fileyear);
    $stmt->bindParam(':filename', $fname);
    $stmt->bindParam(':filelocation', $fileloc);
    // $stmt->bindParam(':dateuploaded', $date_uploaded);
    
    // Execute the query
    if ($stmt->execute()) {
        $_SESSION['uploadfile_message'] = "File upload Success";
        $_SESSION['uploadfile_messagecolor'] = "green";
        header('location: ../admin/syllabus.php');
    } else {
        $_SESSION['uploadfile_message'] = "File upload Failed";
        $_SESSION['uploadfile_messagecolor'] = "red";
        header('location: ../admin/syllabus.php');
        exit();
    }

//     $query_run = mysqli_query($conn, $query);
//     if($query_run) { 
//         $_SESSION['message'] = "Module Uploaded Successfully";
//         header("Location: file_upload.php"); 
//         exit(0);
//     }       
//     else {
//         $_SESSION['message'] = "Module Upload Failed";
//         header("Location: file_upload.php"); 
//         exit(0); 
//     }

header('location: ../admin/syllabus.php');
}
// print_r($_FILES);
?>