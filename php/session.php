<?php
    session_start();

    if (!isset($_SESSION['ID']) || ($_SESSION['ID'] == '')) {
        header('location: ../admin/index.php');
        exit();
    }
?>