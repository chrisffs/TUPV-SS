<?php
include './conn.php'; // Include the database connection script
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


// CHECKER

if (isset($_POST['accept'])) {
    $syllabusid = $_POST['syllabusid'];

    // Retrieve the row from syllabuschecker_tbl
    $sql_select = "SELECT * FROM syllabuschecker_tbl WHERE ID = :syllabusid";
    $stmt_select = $conn->prepare($sql_select);
    $stmt_select->bindParam(':syllabusid', $syllabusid, PDO::PARAM_INT);
    $stmt_select->execute();

    $result = $stmt_select->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // Insert the row into syllabus_tbl
        $sql_insert = "INSERT INTO syllabus_tbl (NAMEUPLOAD, SUBJECTS, CODE, TERM, YEARS, FILES, FILELOC, DATEUPLOAD) VALUES (:NameUpload, :subj, :subjCode, :term, :year, :file, :fileLoc, :dateUpload)";
        $stmt_insert = $conn->prepare($sql_insert);

        if ($stmt_insert) {
            $stmt_insert->bindParam(':NameUpload', $result['NameUpload']);
            $stmt_insert->bindParam(':subj', $result['subj']);
            $stmt_insert->bindParam(':subjCode', $result['subjCode']);
            $stmt_insert->bindParam(':term', $result['term']);
            $stmt_insert->bindParam(':year', $result['year']);
            $stmt_insert->bindParam(':file', $result['file']);
            $stmt_insert->bindParam(':fileLoc', $result['fileLoc']);
            $stmt_insert->bindParam(':dateUpload', $result['dateUpload']);

            if ($stmt_insert->execute()) {
                // Delete the row from syllabuschecker_tbl
                $sql_delete = "DELETE FROM syllabuschecker_tbl WHERE ID = :syllabusid";
                $stmt_delete = $conn->prepare($sql_delete);
                $stmt_delete->bindParam(':syllabusid', $syllabusid, PDO::PARAM_INT);
 
                if ($stmt_delete->execute()) {
                    header("Location: ../ADMIN/dashboard.php");
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