<?php
    session_start(); //to check if there is a session
    session_destroy(); // destroy session to commit logout
    unset($_SESSION['ID']); //remove id from session 
    unset($_SESSION['user_picture']);
    unset($_SESSION['tupv_id']);
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['full_name']);
    unset($_SESSION['department']);
    unset($_SESSION['type']);
    header('location: ../'); //redirect to login
    exit();  // terminate execution of current script(logout.php)
?>
