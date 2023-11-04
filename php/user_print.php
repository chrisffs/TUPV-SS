<?php 
include 'conn.php';
session_start();

if(isset($_POST['print_btn'])) {
    header("Location: ../user/exammaker.php");
    $_SESSION['useralert_message'] = "Exam Generated Successfully.";
    $_SESSION['useralert_messagecolor'] = "green";
}



if(isset($_POST['print_btn']))
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
        $_SESSION['settingsinsert_message'] = $dptn . "(". $acr .")" . " has Added Successfully";
        $_SESSION['settingsinsert_messagecolor'] = "green";
        header("Location: ../ADMIN/settings.php");
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}