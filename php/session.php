<?php
    session_start();

    // if (
    //     !isset($_SESSION['ID']) || $_SESSION['ID'] == '' ||
    //     !isset($_SESSION['full_name']) || $_SESSION['full_name'] == '' ||
    //     !isset($_SESSION['tupv_id']) || $_SESSION['tupv_id'] == ''
    // ) {
    //     header('location: ../admin/index.php');
    //     exit();
    // }
    // Check if the user is authenticated and is an admin
    if ($_SESSION['type'] !== 'admin') {
        header("Location: ../admin/index.php"); // Redirect to unauthorized page
        exit();
    }
?>