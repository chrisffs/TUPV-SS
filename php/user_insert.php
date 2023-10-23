<?php
include 'conn.php';
session_start();
// For verifying if the form method is POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("POST request method required");
}
if(isset($_POST['insertfile'])) {
// Finding out the error for the file upload
if ($_FILES["fileupload_user"]["error"] !== UPLOAD_ERR_OK) {
    switch ($_FILES["fileupload_user"]["error"]) {
        case UPLOAD_ERR_PARTIAL;
            $_SESSION['useruploadfile_message'] = "File only partially uploaded";
            header('location: ../user/uploadsyllabus.php');
            $_SESSION['useruploadfile_messagecolor'] = "red";
            exit();
            break;
        case UPLOAD_ERR_NO_FILE:
            $_SESSION['useruploadfile_message'] = "No file was uploaded";
            header('location: ../user/uploadsyllabus.php');
            $_SESSION['useruploadfile_messagecolor'] = "red";
            exit();
            break;
        case UPLOAD_ERR_EXTENSION:
            $_SESSION['useruploadfile_message'] = "File upload stopped by a PHP Extension";
            header('location: ../user/uploadsyllabus.php');
            $_SESSION['useruploadfile_messagecolor'] = "red";
            exit();
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            $_SESSION['useruploadfile_message'] = "Temporary folder not found";
            header('location: ../user/uploadsyllabus.php');
            $_SESSION['useruploadfile_messagecolor'] = "red";
            exit();
            break;
        case UPLOAD_ERR_CANT_WRITE:
            $_SESSION['useruploadfile_message'] = "Failed to write file";
            header('location: ../user/uploadsyllabus.php');
            $_SESSION['useruploadfile_messagecolor'] = "red";
            exit();
            break;
        default:
            $_SESSION['useruploadfile_message'] = "Unknown upload error";
            header('location: ../user/uploadsyllabus.php');
            $_SESSION['useruploadfile_messagecolor'] = "red";
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
if (! in_array($_FILES["fileupload_user"]["type"], $mime_types)) {
    
    $_SESSION['useruploadfile_message'] = "Invalid file type";
    $_SESSION['useruploadfile_messagecolor'] = "red";
    header('location: ../user/uploadsyllabus.php');
    exit();
}

// For Maximum file size
if ($_FILES["fileupload_user"]["size"] > 10485760) {
    $_SESSION['useruploadfile_message'] = "File exceeds max(10MB)";
    $_SESSION['useruploadfile_messagecolor'] = "red";
    header('location: ../user/uploadsyllabus.php');
    exit();
}

$pathinfo = pathinfo($_FILES["fileupload_user"]["name"]);
$base = $pathinfo["filename"];
$base = preg_replace("/[^\w-]/", "_", $base);
$filename = $base . "." . $pathinfo["extension"];

// Transfering file to a folder
$filename = $_FILES["fileupload_user"]["name"];
$destination = __DIR__ . "/../files/syllabusfiles/" . $filename;

$i = 1;

while (file_exists($destination)) {
    $filename = $base . "($i)." . $pathinfo["extension"];
    $destination = __DIR__ . "/../files/syllabusfiles/" . $filename;

    $i++;
}
if (! move_uploaded_file($_FILES["fileupload_user"]["tmp_name"], $destination)) {
    $_SESSION['useruploadfile_message'] = "Can't move uploaded file";
    $_SESSION['useruploadfile_messagecolor'] = "red";
    header('location: ../user/uploadsyllabus.php');
    exit();
}
    $fileyear = $_POST['file_year-user'];
    $fileterm = $_POST['file_term-user'];
    $filesubject = $_POST['file_subject-user'];
    $subjectcode = $_POST['file_subjCode-user'];
    $uploadedBy = $_SESSION['full_name'];
    $uploadedById = $_SESSION['ID'];
    $fname = $filename;
    $fileloc = realpath("../files/syllabusfiles/" . $filename);
    $date_uploaded = $d = date("Y-m-d H:i:s");
    
    // Prepare the SQL statement
    $sql = "INSERT INTO syllabuschecker_tbl (NameUpload, uploaderId, subj, subjCode, term, year, file, fileLoc) VALUES (:uploadername, :uploaderid, :subject, :subject_code, :term, :year, :filename, :filelocation)";

    $stmt = $conn->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(':uploadername', $uploadedBy);
    $stmt->bindParam(':uploaderid', $uploadedById);
    $stmt->bindParam(':subject', $filesubject);
    $stmt->bindParam(':subject_code', $subjectcode);
    $stmt->bindParam(':term', $fileterm);
    $stmt->bindParam(':year', $fileyear);
    $stmt->bindParam(':filename', $fname);
    $stmt->bindParam(':filelocation', $fileloc);
    // $stmt->bindParam(':dateuploaded', $date_uploaded);
    
    // Execute the query
    if ($stmt->execute()) {
        $_SESSION['useruploadfile_message'] = "File upload Success";
        $_SESSION['useruploadfile_messagecolor'] = "green";
        header('location: ../user/uploadsyllabus.php');
    } else {
        $_SESSION['useruploadfile_message'] = "File upload Failed";
        $_SESSION['useruploadfile_messagecolor'] = "red";
        header('location: ../user/uploadsyllabus.php');
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

header('location: ../user/uploadsyllabus.php');
}
// print_r($_FILES);
?>