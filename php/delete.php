<?php
// Include your database configuration file here
include 'conn.php';

// // Get id from URL
// $id = $_GET['id'];

// // Create delete query
// $query = "DELETE FROM departmenttbl WHERE id = :id";

// try {
//     // Prepare the query
//     $stmt = $conn->prepare($query);

//     // Bind parameters
//     $stmt->bindParam(':id', $id, PDO::PARAM_INT);

//     // Execute the query
//     if ($stmt->execute()) {
//         echo "Record deleted successfully";
//     } else {
//         echo "Error deleting record: " . $stmt->errorInfo()[2];
//     }
// } catch (PDOException $e) {
//     echo "Error: " . $e->getMessage();
// }

// // Redirect back to the main page
// header("Location: ../ADMIN/settings.php");

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



// subject
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


////////////////////////////  course
    
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




/////// syllabus tbl

    if (isset($_GET['delsyl'])){
        $id = $_GET['id'];
        
        // Create delete query
        $query = "DELETE FROM syllabus_tbl WHERE id = :id";
        
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
        header("Location: ../ADMIN/syllabus.php");
        
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
    
    
    
    
    /////// question bank tbl
    
        if (isset($_GET['delques'])){
            $id = $_GET['id'];
            
            // Create delete query
            $query = "DELETE FROM questionbank_tbl WHERE id = :id";
            
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
            header("Location: ../ADMIN/questionbank.php");
            
        }

// DELETE USER | SETTINGS
    if (isset($_GET['deluser'])){
        $id = $_GET['id'];
        
        // Create delete query
        $query = "DELETE FROM accounts_tbl WHERE id = :id";
        
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


<!-- <a href="../php/delete.php?id=< echo $row['id']; ?>&delsyl=true" onclick="return confirm('Are you sure you want to delete this item?');" class="font-medium text-main dark:text-blue-500 hover:underline">Remove</a> -->