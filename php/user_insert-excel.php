<?php
include 'conn.php';
session_start();

require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['submit_excel']))
{
    $fileName = $_FILES['excel']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $filesubj = $_POST['excel_file_subj'];
    $fileyear = $_POST['excel_file_year'];
    $fileterm = $_POST['excel_file_term'];
    $filesem = $_POST['excel_file_sem'];

    $allowed_ext = ['xls','csv','xlsx'];

    if(in_array($file_ext, $allowed_ext))
    {
        $inputFileNamePath = $_FILES['excel']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        // $sql = "INSERT INTO `qbchecker_tbl` (`Subject`, `Year`, `Term`, `Semester`, `Question`, `A`, `B`, `C`, `D`, `Answer`, `uploaderId`, `uploadedby`,) VALUES (:subject, :year, :term, :sem, :question, :a, :b, :c, :d, :answer, :uploaderid, :uploadername)";
        $sql = "INSERT INTO `qbchecker_tbl` (`Subject`, `Year`, `Term`, `Semester`, `Question`, `A`, `B`, `C`, `D`, `Answer`, `uploaderId`, `uploadedby`) VALUES (:subject, :year, :term, :sem, :question, :a, :b, :c, :d, :answer, :uploaderid, :uploadername)";
        $stmt = $conn->prepare($sql);
        
        $count = "0";
        foreach($data as $row)
        {
            if($count > 0)
            {
                $uploadername = $_SESSION['full_name'];
                $uploaderId = $_SESSION['ID']; // You need to set this value
                $qb_subject = $filesubj;
                $qb_year = $fileyear;
                $qb_term = $fileterm;
                $qb_sem = $filesem;
                $qb_question = $row['0'];
                $qb_a = $row['1'];
                $qb_b = $row['2'];
                $qb_c = $row['3'];
                $qb_d = $row['4'];
                $qb_ans = $row['5'];

                // Bind the parameters
                $stmt->bindParam(':uploadername', $uploadername);
                $stmt->bindParam(':uploaderid', $uploaderId);
                $stmt->bindParam(':question', $qb_question);
                $stmt->bindParam(':a', $qb_a);
                $stmt->bindParam(':b', $qb_b);
                $stmt->bindParam(':c', $qb_c);
                $stmt->bindParam(':d', $qb_d);
                $stmt->bindParam(':answer', $qb_ans);
                $stmt->bindParam(':subject', $qb_subject);
                $stmt->bindParam(':year', $qb_year);
                $stmt->bindParam(':term', $qb_term);
                $stmt->bindParam(':sem', $qb_sem);
                
                $stmt->execute();
                $msg = true;
            }
            else
            {
                $count = "1";
            }
        }

        if(isset($msg))
        {
            header("Location: ../user/questionbank.php");
            $_SESSION['useralert_message'] = "Successfully added questions. Wait for admin to accept you submissions.";
            $_SESSION['useralert_messagecolor'] = "green";
            exit(0);
        }
        else
        {
            header("Location: ../user/questionbank.php");
            $_SESSION['useralert_message'] = "Failed to add questions. Please Try Again.";
            $_SESSION['useralert_messagecolor'] = "red";
            exit(0);
        }
    }
    else
    {
        header("Location: ../user/questionbank.php");
        $_SESSION['useralert_message'] = "Invalid file type. Please upload files with the following file extensions (.xls, .csv, .xlsx)";
        $_SESSION['useralert_messagecolor'] = "red";
        exit(0);
    }
}