<?php
    session_start();

    // if (
    //     !isset($_SESSION['ID']) || $_SESSION['ID'] == '' ||
    //     !isset($_SESSION['full_name']) || $_SESSION['full_name'] == '' ||
    //     !isset($_SESSION['tupv_id']) || $_SESSION['tupv_id'] == ''
    // ) {
    //     header('location: ../');
    //     exit();
    // }
    // Check if the user is authenticated and is a user
    if ($_SESSION['type'] !== 'user') {
        header("Location: ../"); // Redirect to unauthorized page
        exit();
    }
?>