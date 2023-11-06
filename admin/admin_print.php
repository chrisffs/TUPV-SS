<?php 
include '../php/conn.php';
session_start();


if(isset($_POST['print_btnAdmin'])) {
    header("Location: ../ADMIN/examgenerator.php ");
    $_SESSION['useralert_message'] = "Exam Printed Successfully.";
    $_SESSION['useralert_messagecolor'] = "green";
}

?>