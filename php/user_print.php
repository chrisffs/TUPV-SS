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
    $S = $_POST['sub'];
    $T = $_POST['term'];
    $SM = $_POST['sem'];
    $NOQ = $_POST['noq'];
    $SETS = $_POST['sets'];
    $UN =   $_SESSION['full_name'];
    $UC = $_POST['uc'];
    $UID = $_SESSION['ID'];


    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO exammaker_tbl (uploader, uploaderId, Subj, Term, Semester, items, exam_sets, uniquecode) VALUES (:UN, :UID, :S, :T, :SM, :NOQ, :SETS, :UC)");

    // Execute the query
    if ($stmt->execute(['UN' => $UN, 'UID' => $UID, 'S' => $S, 'T' => $T, 'SM' => $SM, 'NOQ' => $NOQ, 'SETS' => $SETS, 'UC' => $UC])) {
        echo '<script> alert("Data Saved Successfully!"); </script>';
        // Redirect to the appropriate page after insertion
        header("Location: ../USER/exammaker.php");
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }

}

?>