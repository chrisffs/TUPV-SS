<?php 
include 'conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("POST request method required");
}
if(isset($_POST['insert_questions'])) {
    $numQuestions = $_POST['no_of_questions'];

    $sql = "INSERT INTO qbchecker_tbl (uploaderId, uploadedby, Question, A, B, C, D, Answer, Subject, Year, Term, Semester) VALUES (:uploaderid, :uploadername, :question, :a, :b, :c, :d, :answer, :subject, :year, :term, :sem)";
    $stmt = $conn->prepare($sql);

    // Loop through each question
    for ($i = 1; $i <= $numQuestions; $i++) {
        // Get the values for each question
        $uploadername = $_SESSION['full_name'];
        $uploaderId = $_SESSION['ID']; // You need to set this value
        $qb_subject = $_POST['qbank_subject-user'.$i] ;
        $qb_year = $_POST['qbank_year-user'.$i];
        $qb_term = $_POST['qbank_term-user'.$i];
        $qb_sem = $_POST['qbank_sem-user'.$i];
        $qb_question = $_POST['qbank_question-user'.$i];
        $qb_a = $_POST['choice_a-user'.$i];
        $qb_b = $_POST['choice_b-user'.$i];
        $qb_c = $_POST['choice_c-user'.$i];
        $qb_d = $_POST['choice_d-user'.$i];
        $qb_ans = $_POST['qb_answer-user'.$i];

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

        // Execute the query for this question
        if ($stmt->execute()) {
            echo "Data for question $i inserted successfully!<br>";
            header("Location: ../user/questionbank.php");
            $_SESSION['useralert_message'] = "Successfully added ". $numQuestions . " question/s";
            $_SESSION['useralert_messagecolor'] = "green";
        } else {
            echo "Error for question $i: " . $stmt->errorInfo() . "<br>";
            header("Location: ../user/questionbank.php");
            $_SESSION['useralert_message'] = "Failed to add". $numQuestions . "question/s. Please Try Again.";
            $_SESSION['useralert_messagecolor'] = "red";
        }
    }
};
header("Location: ../user/questionbank.php");
?>