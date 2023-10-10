<?php
// Include your database configuration file here
include 'conn.php';

// Get id from URL
$id = $_GET['id'];

// Create delete query
$query = "DELETE FROM departmenttbl WHERE id = :id";

try {
    // Prepare the query
    $stmt = $conn->prepare($query);

    // Bind parameters
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Execute the query
    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $stmt->errorInfo()[2];
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Redirect back to the main page
header("Location: ../ADMIN/settings.php");






// subject delete
// Get id from URL

if (isset($_GET['delfa'])){
$id = $_GET['id'];

// Create delete query
$query = "DELETE FROM departmenttbl WHERE id = :id";

try {
    // Prepare the query
    $stmt = $conn->prepare($query);

    // Bind parameters
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Execute the query
    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $stmt->errorInfo()[2];
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Redirect back to the main page
header("Location: ../ADMIN/settings.php");

}




if (isset($_GET['delsub'])){
    $id = $_GET['id'];
    
    // Create delete query
    $query = "DELETE FROM subject_tbl WHERE id = :id";
    
    try {
        // Prepare the query
        $stmt = $conn->prepare($query);
    
        // Bind parameters
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
        // Execute the query
        if ($stmt->execute()) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $stmt->errorInfo()[2];
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
    // Redirect back to the main page
    header("Location: ../ADMIN/settings.php");
    
    }



    
if (isset($_GET['delcourse'])){
    $id = $_GET['id'];
    
    // Create delete query
    $query = "DELETE FROM courses_tbl WHERE id = :id";
    
    try {
        // Prepare the query
        $stmt = $conn->prepare($query);
    
        // Bind parameters
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
        // Execute the query
        if ($stmt->execute()) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $stmt->errorInfo()[2];
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
    // Redirect back to the main page
    header("Location: ../ADMIN/settings.php");
    
    }
?>
