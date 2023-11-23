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

if(isset($_POST['updateUserDetails'])) {

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
    $usercourse = $_POST['editusercourse'];
    // $userpass = password_hash($_POST['edituserpass'], PASSWORD_DEFAULT);
    $usertype = $_POST['editusertype'];

    // Prepare and execute the SQL query to update the department
    $sql = "UPDATE accounts_tbl SET tupv_id = :editusertupvid, full_name = :edituserfname, department = :edituserdept, course = :editusercourse, type = :editusertype, user_picture = :picture, userpic_fileloc = :piclocation WHERE ID = :edituserid";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':edituserid', $userid);
    $stmt->bindParam(':edituserfname', $userfname);
    $stmt->bindParam(':editusertupvid', $usertupvid);
    $stmt->bindParam(':edituserdept', $userdept);
    $stmt->bindParam(':editusercourse', $usercourse);
    $stmt->bindParam(':editusertype', $usertype);
    $stmt->bindParam(':picture', $userpic);
    $stmt->bindParam(':piclocation', $userpicloc);
    
    if ($stmt->execute()) {
        // Redirect back to the page where you came from
        header("Location: ../admin/settings.php");
        exit();
    } else {
        echo "Error updating User Details: " . $stmt->errorInfo()[2];
    }
    
    $stmt->closeCursor();
}

if(isset($_POST['updateUserAccount'])) {
    $userid = $_POST['editaccuserid'];
    $username = $_POST['edituseruname'];
    $userpass = password_hash($_POST['edituserpass'], PASSWORD_DEFAULT);

    // Prepare and execute the SQL query to update the department
    $sql = "UPDATE accounts_tbl SET username = :edituseruname, password = :edituserpass WHERE ID = :editaccuserid";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':editaccuserid', $userid);
    $stmt->bindParam(':edituseruname', $username);
    $stmt->bindParam(':edituserpass', $userpass);

    if ($stmt->execute()) {
        // Redirect back to the page where you came from
        header("Location: ../admin/settings.php");
        exit();
    } else {
        echo "Error updating User Account: " . $stmt->errorInfo()[2];
    }
    
    $stmt->closeCursor();
}



if (isset($_POST['updateFaculty'])) {
    $id =  $_POST['id'];
    $fn = $_POST['fn'];
    $un = $_POST['un'];
    $dept = $_POST['dept'];
    $conpass = $_POST['confirm_password'];

    $passwordChanged = false;

    // Check if a new password is provided
    if (!empty($conpass)) {
        // New password is provided, hash it
        $hashedPassword = password_hash($conpass, PASSWORD_DEFAULT);
        // Update query with password change
        $sql = "UPDATE accounts_tbl SET full_name = :fullName, username = :username, department = :dept, password = :pass WHERE ID = :id";
        $passwordChanged = true;
    } else {
        // No new password, keep the existing password
        // Check if the department is empty, if so, set it to the current department
        $dept = (!empty($dept)) ? $dept : $row['department'];
        $sql = "UPDATE accounts_tbl SET full_name = :fullName, username = :username, department = :dept WHERE ID = :id";
    }

    // Prepare and execute the query
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':fullName', $fn, PDO::PARAM_STR);
    $stmt->bindParam(':username', $un, PDO::PARAM_STR);
    $stmt->bindParam(':dept', $dept, PDO::PARAM_STR);

    // If a new password is provided, bind the hashed password
    if (!empty($conpass)) {
        $stmt->bindParam(':pass', $hashedPassword, PDO::PARAM_STR);
    }

    // Execute the query and handle the result
    if ($stmt->execute()) {
        echo "Update successful!";

        // Logout the user only if the password is changed
        if ($passwordChanged) {
            session_start();
            session_destroy();
        }

        $_SESSION['useralert_message'] = "Update Profile Information Success";
        $_SESSION['useralert_messagecolor'] = "green";
        header("Location: ../user/profile.php");
        exit();
    } else {
        $_SESSION['useralert_message'] = "Update Profile Information Failed";
        $_SESSION['useralert_messagecolor'] = "red";
        echo "Update failed: " . implode(", ", $stmt->errorInfo());
        header("Location: ../user/profile.php");
    }
}


$conn = null; // Close the PDO connection

?>