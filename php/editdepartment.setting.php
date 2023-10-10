<?php 
include "conn.php";

if(isset($_POST['updateDept'])) {
    // Get the values from the form
    $id = $_POST['editid']; // Assuming you have an input field for department ID
    $dptname = $_POST['editdptname'];
    $acronym = $_POST['editacronym'];

    // Prepare and execute the SQL query to update the department
    $sql = "UPDATE departmenttbl SET dptname = :editdptname, acronym = :editacronym WHERE id = :editid";
    $stmt = $conn->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(':editdptname', $dptname);
    $stmt->bindParam(':editacronym', $acronym);
    $stmt->bindParam(':editid', $id);
    
    if ($stmt->execute()) {
        // Redirect back to the page where you came from
        header("Location: ../admin/settings.php");
        exit();
    } else {
        echo "Error updating department: " . $stmt->errorInfo()[2];
    }
    
    $stmt->closeCursor();
}

$conn = null; // Close the PDO connection

?>