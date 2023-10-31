<?php 
include 'conn.php';
session_start();

if(isset($_POST['print_btn'])) {
    header("Location: ../user/exammaker.php");
    $_SESSION['useralert_message'] = "Exam Generated Successfully.";
    $_SESSION['useralert_messagecolor'] = "green";
}