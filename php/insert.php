<?php
include './conn.php'; // Include the database connection script




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
        header("Location: ../ADMIN/settings.php");
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
?>