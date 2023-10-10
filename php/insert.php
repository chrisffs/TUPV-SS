<?php
include './conn.php'; // Include the database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dptname = $_POST['dptname'];
    $acronym = $_POST['acronym'];
    
    // Prepare and execute the SQL query to insert data into the departmenttbl
    $sql = "INSERT INTO departmenttbl (dptname, acronym) VALUES (:dptname, :acronym)";
    $stmt = $conn->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(':dptname', $dptname);
    $stmt->bindParam(':acronym', $acronym);
    
    if ($stmt->execute()) {
        
        header("Location: ../ADMIN/settings.php");
    } else {
        echo "Error: " . $sql . "<br>" . $stmt->errorInfo()[2];
    }
    
    $stmt->closeCursor();
}

$conn = null; // Close the PDO connection
?>