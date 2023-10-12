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
    $userid = $_POST['edituserid']; // Assuming you have an input field for department ID
    $userfname = $_POST['edituserfname'];
    $usertupvid = $_POST['editusertupvid'];
    $userdept = $_POST['edituserdept'];
    $username = $_POST['edituseruname'];
    $userpass = $_POST['edituserpass'];
    $usertype = $_POST['editusertype'];

    // Prepare and execute the SQL query to update the department
    $sql = "UPDATE accounts_tbl SET tupv_id = :editusertupvid, username = :edituseruname, password = :edituserpass, full_name = :edituserfname, department = :edituserdept, type = :editusertype WHERE ID = :edituserid";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':edituserid', $userid);
    $stmt->bindParam(':edituserfname', $userfname);
    $stmt->bindParam(':editusertupvid', $usertupvid);
    $stmt->bindParam(':edituserdept', $userdept);
    $stmt->bindParam(':edituseruname', $username);
    $stmt->bindParam(':edituserpass', $userpass);
    $stmt->bindParam(':editusertype', $usertype);
    
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