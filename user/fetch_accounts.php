<?php
// Include the connection details
include '../php/conn.php';

// Check if the request is made using AJAX
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    try {
        // Assuming you have an account ID that you want to fetch from the request
        $accountId = $_GET['accountId']; // Adjust this according to your needs

        // Prepare and execute the SQL query
        $stmt = $conn->prepare("SELECT * FROM accounts_tbl WHERE ID = :id");
        $stmt->bindParam(':id', $accountId, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch the account data
        $accountData = $stmt->fetch(PDO::FETCH_ASSOC);

        // Output the data as JSON
        header('Content-Type: application/json');
        echo json_encode($accountData);
    } catch (PDOException $e) {
        // Handle database errors
        http_response_code(500);
        echo json_encode(['error' => 'Database error']);
    }
} else {
    // If the request is not made using AJAX, return an error
    http_response_code(400);
    echo json_encode(['error' => 'Bad Request']);
}
?>
