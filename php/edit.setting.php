<?php 
include "conn.php";

if(isset($_POST['updateDept'])) {
    // Get the values from the form
    $dptid = $_POST['editdeptid']; // Assuming you have an input field for department ID
    $dptname = $_POST['editdptname'];
    $dptacronym = $_POST['editdptacronym'];

    // Prepare and execute the SQL query to update the department
    $sql = "UPDATE departmenttbl SET dptname = :editdptname, acronym = :editdptacronym WHERE id = :editdeptid";
    $stmt = $conn->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(':editdptname', $dptname);
    $stmt->bindParam(':editdptacronym', $dptacronym);
    $stmt->bindParam(':editdeptid', $dptid);
    
    if ($stmt->execute()) {
        // Redirect back to the page where you came from
        header("Location: ../admin/settings.php");
        exit();
    } else {
        echo "Error updating department: " . $stmt->errorInfo()[2];
    }
    
    $stmt->closeCursor();
}

if(isset($_POST['updateCourse'])) {
    $crsid = $_POST['editcrsid']; // Assuming you have an input field for department ID
    $crsname = $_POST['editcrsname'];
    $crsacronym = $_POST['editcrsacronym'];
    $crsdept = $_POST['editcrsdept'];

    // Prepare and execute the SQL query to update the department
    $sql = "UPDATE courses_tbl SET courseName = :editcrsname, acro = :editcrsacronym, dept = :editcrsdept WHERE id = :editcrsid";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':editcrsname', $crsname);
    $stmt->bindParam(':editcrsacronym', $crsacronym);
    $stmt->bindParam(':editcrsid', $crsid);
    $stmt->bindParam(':editcrsdept', $crsdept);
    
    if ($stmt->execute()) {
        // Redirect back to the page where you came from
        header("Location: ../admin/settings.php");
        exit();
    } else {
        echo "Error updating Subject: " . $stmt->errorInfo()[2];
    }
    
    $stmt->closeCursor();
}

if(isset($_POST['updateSubject'])) {
    $sbjid = $_POST['editsbjid']; // Assuming you have an input field for department ID
    $sbjname = $_POST['editsbjname'];
    $sbjcode = $_POST['editsbjcode'];

    // Prepare and execute the SQL query to update the department
    $sql = "UPDATE subject_tbl SET subjectName = :editsbjname, subjCode = :editsbjcode WHERE id = :editsbjid";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':editsbjname', $sbjname);
    $stmt->bindParam(':editsbjcode', $sbjcode);
    $stmt->bindParam(':editsbjid', $sbjid);

    if ($stmt->execute()) {
        // Redirect back to the page where you came from
        header("Location: ../admin/settings.php");
        exit();
    } else {
        echo "Error updating Subject: " . $stmt->errorInfo()[2];
    }
    
    $stmt->closeCursor();
}

if(isset($_POST['updateUser'])) {

    if ($_FILES["change_userpic"]["error"] === UPLOAD_ERR_NO_FILE) {
        $filename = $_POST['userprofilepic'];
    } elseif ($_FILES["change_userpic"]["error"] !== UPLOAD_ERR_OK) {
        // Handle other file upload errors
        switch ($_FILES["change_userpic"]["error"]) {
            case UPLOAD_ERR_PARTIAL:
                exit("File only partially uploaded");
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
            default:
                exit("Unknown upload error");
                break;
        }
    } else {
        // checking the file info
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime_type = $finfo->file($_FILES["change_userpic"]["tmp_name"]);

        // exit($mime_type); 
        $mime_types = [
        'image/jpeg',  // JPEG images
        'image/png',   // PNG images
        'image/gif',   // GIF images
        'image/bmp',   // BMP images
        'image/webp',  // WebP images
        'image/svg+xml',  // SVG images
        // Add more MIME types as needed
        ];

        if (! in_array($_FILES["change_userpic"]["type"], $mime_types)) {
            exit("Invalid file type");
        }
        // For Maximum file size
        if ($_FILES["change_userpic"]["size"] > 10485670) {
            exit("File exceeds max(10MB)");
        }

        $pathinfo = pathinfo($_FILES["change_userpic"]["name"]);
        $base = $pathinfo["filename"];
        $base = preg_replace("/[^\w-]/", "_", $base);
        $filename = $base . "." . $pathinfo["extension"];
        
        // Transfering file to a folder
        $filename = $_FILES["change_userpic"]["name"];
        $destination = __DIR__ . "/../files/userpics/" . $filename;

        $i = 1;

        while (file_exists($destination)) {
            $filename = $base . "($i)." . $pathinfo["extension"];
            $destination = __DIR__ . "/../files/userpics/" . $filename;
            $i++;
        }

        if (! move_uploaded_file($_FILES["change_userpic"]["tmp_name"], $destination)) {
            exit("Can't move uploaded file");
        }
    }

    $userpic = $filename;
    $userpicloc = realpath("../files/userpics/" . $filename);
    $userid = $_POST['edituserid']; // Assuming you have an input field for department ID
    $userfname = $_POST['edituserfname'];
    $usertupvid = $_POST['editusertupvid'];
    $userdept = $_POST['edituserdept'];
    $username = $_POST['edituseruname'];
    $userpass = password_hash($_POST['edituserpass'], PASSWORD_DEFAULT);
    $usertype = $_POST['editusertype'];

    // Prepare and execute the SQL query to update the department
    $sql = "UPDATE accounts_tbl SET tupv_id = :editusertupvid, username = :edituseruname, password = :edituserpass, full_name = :edituserfname, department = :edituserdept, type = :editusertype, user_picture = :picture, userpic_fileloc = :piclocation WHERE ID = :edituserid";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':edituserid', $userid);
    $stmt->bindParam(':edituserfname', $userfname);
    $stmt->bindParam(':editusertupvid', $usertupvid);
    $stmt->bindParam(':edituserdept', $userdept);
    $stmt->bindParam(':edituseruname', $username);
    $stmt->bindParam(':edituserpass', $userpass);
    $stmt->bindParam(':editusertype', $usertype);
    $stmt->bindParam(':picture', $userpic);
    $stmt->bindParam(':piclocation', $userpicloc);
    
    if ($stmt->execute()) {
        // Redirect back to the page where you came from
        header("Location: ../admin/settings.php");
        exit();
    } else {
        echo "Error updating Subject: " . $stmt->errorInfo()[2];
    }
    
    $stmt->closeCursor();
}



$conn = null; // Close the PDO connection

?>