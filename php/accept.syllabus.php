<?php
// Include your database configuration file here
include 'conn.php';

// Get id from URL
$id = $_GET['ID'];

// Create delete query
$query = "INSERT INTO syllabus_tbl SELECT * FROM syllabuschecker_tbl WHERE ID = :ID; DELETE FROM syllabuschecker_tbl WHERE ID = :ID;";

try {
    // Prepare the query
    $stmt = $conn->prepare($query);

    // Bind parameters
    $stmt->bindParam(':ID', $id, PDO::PARAM_INT);

    // Execute the query
    if ($stmt->execute()) {
        echo "Question accepted successfully";
    } else {
        echo "Error accepting question: " . $stmt->errorInfo()[2];
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Redirect back to the main page
header("Location: ../admin/dashboard.php");
?>
