<?php
include './conn.php'; // Include the database connection script
include '../php/TIMEAGO.PHP';
session_start(); // Start a PHP session

if(isset($_POST['insertdpt']))
{
    $dptn = $_POST['dptname'];
    $acr = $_POST['acronym'];

    // Prepare the SQL statement
    $sql = "INSERT INTO departmenttbl (dptname, acronym) VALUES (:dptn, :acr)";
    $stmt = $conn->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(':dptn', $dptn);
    $stmt->bindParam(':acr', $acr);
    
    // Execute the query
    if ($stmt->execute()) {
        $_SESSION['department_added'] = true;
        header("Location: ../ADMIN/settings.php");
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

if(isset($_POST['insertcourse']))
{
    $cn = $_POST['courseName'];
    $ac1 = $_POST['acro'];
    $ac2 = $_POST['acronym'];

    // Prepare the SQL statement
    $sql = "INSERT INTO courses_tbl (courseName, acro, dept ) VALUES (:cname, :acros, :acros2)";
    $stmt = $conn->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(':cname', $cn);
    $stmt->bindParam(':acros', $ac1);
    $stmt->bindParam(':acros2', $ac2);
    
    // Execute the query
    if ($stmt->execute()) {
        $_SESSION['course_added'] = true;
        header("Location: ../ADMIN/settings.php");
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

if(isset($_POST['insertsubject']))
{
    $sn = $_POST['subjectName'];
    $sc = $_POST['subjCode'];

    // Prepare the SQL statement
    $sql = "INSERT INTO subject_tbl (subjectName, subjCode) VALUES (:names, :code)";
    $stmt = $conn->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(':names', $sn);
    $stmt->bindParam(':code', $sc);
    
    // Execute the query
    if ($stmt->execute()) {
        $_SESSION['subject_added'] = true;
        header("Location: ../ADMIN/settings.php");
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

if(isset($_POST['insertuser']))
{
    $ufn = $_POST['userFullName'];
    $utupvid = $_POST['userTupvId'];
    $udept = $_POST['userDept'];
    $uun = $_POST['userUName'];
    $upass = $_POST['userPass'];
    $utype = $_POST['usertype'];

    // Prepare the SQL statement
    $sql = "INSERT INTO accounts_tbl (tupv_id, username, password, full_name, department, type) VALUES (:tupvid, :username, :password, :fullname, :department, :type)";
    $stmt = $conn->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(':tupvid', $utupvid);
    $stmt->bindParam(':username', $uun);
    $stmt->bindParam(':password', $upass);
    $stmt->bindParam(':fullname', $ufn);
    $stmt->bindParam(':department', $udept);
    $stmt->bindParam(':type', $utype);
    
    // Execute the query
    if ($stmt->execute()) {
        $_SESSION['user_added'] = true;
        header("Location: ../ADMIN/settings.php");
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}


// CHECKER syllabus dashboard.
// accept
if (isset($_POST['accept']) || isset($_POST['accept1'])) {
    $syllabusid = $_POST['syllabusid'];

    // Retrieve the row from syllabuschecker_tbl
    $sql_select = "SELECT * FROM syllabuschecker_tbl WHERE ID = :syllabusid";
    $stmt_select = $conn->prepare($sql_select);
    $stmt_select->bindParam(':syllabusid', $syllabusid, PDO::PARAM_INT);
    $stmt_select->execute();

    $result = $stmt_select->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // Insert the row into syllabus_tbl
        $sql_insert_syllabus = "INSERT INTO syllabus_tbl (NAMEUPLOAD, SUBJECTS, CODE, TERM, YEARS, FILES, FILELOC, DATEUPLOAD) VALUES (:NameUpload, :subj, :subjCode, :term, :year, :file, :fileLoc, :dateUpload)";
        $stmt_insert_syllabus = $conn->prepare($sql_insert_syllabus);

        // Define variables for actlog_tbl
        $syllabus = "Syllabus";
        $accepted = "Accepted";
        $module = "Module";

        // Insert into actlog_tbl
        $sql_insert_actlog = "INSERT INTO actlog_tbl (type, upload_time, choice, type_content, upload_name, content) VALUES (:syllabus, :dateUpload, :accepted, :module, :NameUpload, :file)";
        $stmt_insert_actlog = $conn->prepare($sql_insert_actlog);

        if ($stmt_insert_syllabus && $stmt_insert_actlog) {
            $stmt_insert_syllabus->bindParam(':NameUpload', $result['NameUpload']);
            $stmt_insert_syllabus->bindParam(':subj', $result['subj']);
            $stmt_insert_syllabus->bindParam(':subjCode', $result['subjCode']);
            $stmt_insert_syllabus->bindParam(':term', $result['term']);
            $stmt_insert_syllabus->bindParam(':year', $result['year']);
            $stmt_insert_syllabus->bindParam(':file', $result['file']);
            $stmt_insert_syllabus->bindParam(':fileLoc', $result['fileLoc']);
            $stmt_insert_syllabus->bindParam(':dateUpload', $result['dateUpload']);

            $stmt_insert_actlog->bindParam(':syllabus', $syllabus);
            $stmt_insert_actlog->bindParam(':dateUpload', $result['dateUpload']);
            $stmt_insert_actlog->bindParam(':accepted', $accepted);
            $stmt_insert_actlog->bindParam(':module', $module);
            $stmt_insert_actlog->bindParam(':NameUpload', $result['NameUpload']);
            $stmt_insert_actlog->bindParam(':file', $result['file']);

            if ($stmt_insert_syllabus->execute() && $stmt_insert_actlog->execute()) {
                // Delete the row from syllabuschecker_tbl
                $sql_delete = "DELETE FROM syllabuschecker_tbl WHERE ID = :syllabusid";
                $stmt_delete = $conn->prepare($sql_delete);
                $stmt_delete->bindParam(':syllabusid', $syllabusid, PDO::PARAM_INT);

                if ($stmt_delete->execute()) {
                    if (isset($_POST['accept'])) {
                        header("Location: ../ADMIN/dashboard.php");
                    } elseif (isset($_POST['accept1'])) {
                        header("Location: ../ADMIN/syllabus.php");
                    }
                } else {
                    echo "Error deleting from syllabuschecker_tbl: " . $stmt_delete->errorInfo()[2];
                }
            } else {
                echo "Error inserting into syllabus_tbl or actlog_tbl.";
            }
        } else {
            echo "Error preparing the insert statement: " . $conn->errorInfo()[2];
        }
    } else {
        echo "Row not found in syllabuschecker_tbl";
    }
}

// decline

if (isset($_POST['decline']) || isset($_POST['decline1'])) {
    $syllabusid = $_POST['syllabusidec'];

    // Retrieve the row from syllabuschecker_tbl
    $sql_select = "SELECT * FROM syllabuschecker_tbl WHERE ID = :syllabusidec";
    $stmt_select = $conn->prepare($sql_select);
    $stmt_select->bindParam(':syllabusidec', $syllabusid, PDO::PARAM_INT);
    $stmt_select->execute();

    $result = $stmt_select->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // Insert the row into declinedsyllabus_tbl 
        $sql_insert = "INSERT INTO declinedsyllabus_tbl  (NameUpload, subj, subjCode, term, year, file, fileLoc, dateUpload) VALUES (:NameUpload, :subj, :subjCode, :term, :year, :file, :fileLoc, :dateUpload)";
        $stmt_insert = $conn->prepare($sql_insert);

          // Define variables for actlog_tbl
          $syllabus = "Syllabus";
          $decline = "Declined";
          $module = "Module";
  
          // Insert into actlog_tbl
          $sql_insert_actlog = "INSERT INTO actlog_tbl (type, upload_time, choice, type_content, upload_name, content) VALUES (:syllabus, :dateUpload, :decline, :module, :NameUpload, :file)";
          $stmt_insert_actlog = $conn->prepare($sql_insert_actlog);

        if ($stmt_insert) {
            $stmt_insert->bindParam(':NameUpload', $result['NameUpload']);
            $stmt_insert->bindParam(':subj', $result['subj']);
            $stmt_insert->bindParam(':subjCode', $result['subjCode']);
            $stmt_insert->bindParam(':term', $result['term']);
            $stmt_insert->bindParam(':year', $result['year']);
            $stmt_insert->bindParam(':file', $result['file']);
            $stmt_insert->bindParam(':fileLoc', $result['fileLoc']);
            $stmt_insert->bindParam(':dateUpload', $result['dateUpload']);


            $stmt_insert_actlog->bindParam(':syllabus', $syllabus);
            $stmt_insert_actlog->bindParam(':dateUpload', $result['dateUpload']);
            $stmt_insert_actlog->bindParam(':decline', $decline);
            $stmt_insert_actlog->bindParam(':module', $module);
            $stmt_insert_actlog->bindParam(':NameUpload', $result['NameUpload']);
            $stmt_insert_actlog->bindParam(':file', $result['file']);


            if ($stmt_insert->execute() && $stmt_insert_actlog->execute()) {
                // Delete the row from syllabuschecker_tbl
                $sql_delete = "DELETE FROM syllabuschecker_tbl WHERE ID = :syllabusidec";
                $stmt_delete = $conn->prepare($sql_delete);
                $stmt_delete->bindParam(':syllabusidec', $syllabusid, PDO::PARAM_INT);
 
                if ($stmt_delete->execute()) {
                    if (isset($_POST['decline'])) {
                        header("Location: ../ADMIN/dashboard.php");
                    } elseif (isset($_POST['decline1'])) {
                        header("Location: ../ADMIN/syllabus.php");
                    }
                } else {
                    echo "Error deleting from syllabuschecker_tbl: " . $stmt_delete->errorInfo()[2];
                }
            } else {
                echo "Error inserting into syllabus_tbl: " . $stmt_insert->errorInfo()[2];
            }
        } else {
            echo "Error preparing the insert statement: " . $conn->errorInfo()[2];
        }
    } else {
        echo "Row not found in syllabuschecker_tbl";
    }
}

?>