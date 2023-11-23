<?php
include '../php/conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['print_btn'])) {
    try {
        // Begin a transaction
        $conn->beginTransaction();

        $S = $_POST['sub'];
        $T = $_POST['term'];
        $SM = $_POST['sem'];
        $NOQ = $_POST['noq'];
        $SETS = $_POST['sets'];
        $UN = $_SESSION['full_name'];
        $UID = $_SESSION['ID'];
        $uc = $_POST['uc'];

        // Prepare the SQL statement for exammaker_tbl
        $stmt = $conn->prepare("INSERT INTO exammaker_tbl (uploader, uploaderId, Subj, Term, Semester, items, exam_sets, uniquecode) VALUES (:UN, :UID, :S, :T, :SM, :NOQ, :SETS, :UC)");

        // Bind parameters for the exammaker_tbl query
        $stmt->bindParam(':UN', $UN);
        $stmt->bindParam(':UID', $UID);
        $stmt->bindParam(':S', $S);
        $stmt->bindParam(':T', $T);
        $stmt->bindParam(':SM', $SM);
        $stmt->bindParam(':NOQ', $NOQ);
        $stmt->bindParam(':SETS', $SETS);
        $stmt->bindParam(':UC', $uc);

        // Execute the exammaker_tbl query
        if ($stmt->execute()) {
            echo '<script> alert("Data Saved Successfully!"); </script>';

            // Loop through the submitted data for each question
            for ($i = 1; isset($_POST['ans' . $i]); $i++) {
                // Retrieve question details
                $question = $_POST['Question' . $i];
                $optionA = $_POST['A' . $i];
                $optionB = $_POST['B' . $i];
                $optionC = $_POST['C' . $i];
                $optionD = $_POST['D' . $i];
                $answer = $_POST['ans' . $i];
                $questionID = $_POST['ID' . $i];
                $testPart = $_POST['test_part' . $i];
                $set = $_POST['set' . $i];

                // Prepare the SQL statement for generatedquestions_tbl2
                $stmt = $conn->prepare("INSERT INTO generatedquestions_tbl2 (Question, A, B, C, D, Answer, test_number, question_set, UniqueCode, QuestionID) VALUES (:question, :optionA, :optionB, :optionC, :optionD, :answer, :test_num, :q_set, :UC, :questionID)");

                // Bind parameters for the generatedquestions_tbl2 query
                $stmt->bindParam(':question', $question);
                $stmt->bindParam(':optionA', $optionA);
                $stmt->bindParam(':optionB', $optionB);
                $stmt->bindParam(':optionC', $optionC);
                $stmt->bindParam(':optionD', $optionD);
                $stmt->bindParam(':answer', $answer);
                $stmt->bindParam(':test_num', $testPart);
                $stmt->bindParam(':q_set', $set);
                $stmt->bindParam(':UC', $uc);
                $stmt->bindParam(':questionID', $questionID);

                // Execute the generatedquestions_tbl2 statement
                if (!$stmt->execute()) {
                    throw new Exception("Error: " . $stmt->errorInfo()[2]);
                }
            }

            // Commit the transaction
            $conn->commit();

            // Redirect or perform additional actions after successful transactions
            header("Location: ../USER/exammaker.php");
            exit();
        } else {
            echo '<script> alert("Data Not Saved"); </script>';
        }
    } catch (Exception $e) {
        // An error occurred, roll back the transaction
        $conn->rollBack();

        echo "Transaction failed: " . $e->getMessage();
    }
}
?>
