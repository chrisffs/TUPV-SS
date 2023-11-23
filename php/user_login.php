<?php 
include 'conn.php';
session_start();

if (isset($_POST['login'])) {
    $username_in = $_POST['tupv_id'];
    $pass_in = $_POST['password'];

    // Use prepared statement to avoid SQL injection
    $sql = "SELECT * FROM accounts_tbl WHERE username = :username AND type = 'user'";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':username', $username_in, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // Check if password_verify is working properly
        if (password_verify($pass_in, $result['password'])) {
            // Password is correct
            $_SESSION['ID'] = $result['ID'];
            $_SESSION['profile_pic'] = $result['user_picture'];
            $_SESSION['tupv_id'] = $result['tupv_id'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['password'] = $result['password'];
            $_SESSION['full_name'] = $result['full_name'];
            $_SESSION['department'] = $result['department'];
            $_SESSION['course'] = $result['course'];
            $_SESSION['type'] = $result['type'];

            // Check if header location is correct
            header('Location: ../user/'); // Make sure this path is correct
            exit();
        } else {
            // Incorrect password
            $_SESSION['invalid'] = "Wrong password.";
            $_SESSION['pre-filled-username'] = $username_in;
            header("Location: ../"); // Make sure this path is correct
            exit();
        }
    } else {
        // User not found
        $_SESSION['invalid'] = "Username is invalid.";
        $_SESSION['pre-filled-username'] = "";
        header("Location: ../"); // Make sure this path is correct
        exit();
    }
}
?>
