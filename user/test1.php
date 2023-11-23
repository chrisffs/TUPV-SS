<?php
include '../php/conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['print_btn'])) {
    // Loop through the submitted data for each question
    for ($i = 1; isset($_POST['ans' . $i]); $i++) {
        $term = $_POST['term'];
        $sub = $_POST['sub'];
        $sem = $_POST['sem'];
        $question = $_POST['Question' . $i];
        $optionA = $_POST['A' . $i];
        $optionB = $_POST['B' . $i];
        $optionC = $_POST['C' . $i];
        $optionD = $_POST['D' . $i];
        $answer = $_POST['ans' . $i];
        $questionID = $_POST['ID' . $i];
        $testPart = $_POST['test_part' . $i];
        $uc = $_POST['uc'];

        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO generatedquestions_tbl (Question, A, B, C, D, Answer, test_number, UniqueCode, QuestionID) VALUES (:question, :optionA, :optionB, :optionC, :optionD, :answer, :test_num, :UC, :questionID)");

        // Bind the parameters
        $stmt->bindParam(':question', $question);
        $stmt->bindParam(':optionA', $optionA);
        $stmt->bindParam(':optionB', $optionB);
        $stmt->bindParam(':optionC', $optionC);
        $stmt->bindParam(':optionD', $optionD);
        $stmt->bindParam(':answer', $answer);
        $stmt->bindParam(':test_num', $testPart);
        $stmt->bindParam(':UC', $uc);
        $stmt->bindParam(':questionID', $questionID);

        // Execute the statement
        $stmt->execute();
    }

    // Redirect or perform additional actions after inserting data
    header("Location: ./paper.php?uniquecode=$uc&Term=$term&Subj=$sub&Semester=$sem");
    exit();
}
?>
