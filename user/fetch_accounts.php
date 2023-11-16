<?php
include '../php/conn.php';

session_start();

if (isset($_SESSION['ID'])) {
    $query = "SELECT * FROM accounts_tbl WHERE ID = :id";
    $statement = $conn->prepare($query);
    $statement->bindParam(':id', $_SESSION['ID']);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    // Output data as JSON
    echo json_encode($result);
} else {
    // Handle the case where the session ID is not set
    echo json_encode(['error' => 'Session ID not set']);
}
?>
