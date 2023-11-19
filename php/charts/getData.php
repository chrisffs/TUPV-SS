<?php
require_once('../conn.php');
include '../user_session.php';

// Function to fetch data based on the user's session ID
function fetchData() {
    global $conn; // Assuming $conn is your database connection

    // You may need to adjust the table name and column names based on your database structure
    $stmt = $conn->prepare("SELECT SUM(upload_count_accepted) AS total_count_accepted, SUM(upload_count_declined) AS total_count_declined FROM ( SELECT COUNT(*) AS upload_count_accepted, 0 AS upload_count_declined FROM questionbank_tbl WHERE uploaderId = 17 UNION ALL SELECT 0 AS upload_count_accepted, COUNT(*) AS upload_count_declined FROM syllabus_tbl WHERE USERUPLOADID = 17 UNION ALL SELECT COUNT(*) AS upload_count_accepted, 0 AS upload_count_declined FROM qbdecline_tbl WHERE uploaderId = 17 UNION ALL SELECT 0 AS upload_count_accepted, COUNT(*) AS upload_count_declined FROM declinedsyllabus_tbl WHERE uploaderId = 17 ) AS combined_counts");
    
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result ? $result : ['total_count_accepted' => 0, 'total_count_declined' => 0]; // Default values if no data found
}

// Fetch data based on the user's session ID
$data = fetchData();

// Return data as JSON
header('Content-Type: application/json');
echo json_encode(['total_count_accepted' => $data['total_count_accepted'], 'total_count_declined' => $data['total_count_declined']]);
?>
