<?php 
include 'conn.php';
session_start();

if (isset($_POST['login'])) {
    $username_in = $_POST['tupv_id'];
    $pass_in = $_POST['password'];

    // Use prepared statement to avoid SQL injection
    $sql = "SELECT * FROM accounts_tbl WHERE tupv_id = :username AND password = :password AND type = 'user'";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':username', $username_in, PDO::PARAM_STR);
    $stmt->bindValue(':password', $pass_in, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $_SESSION['ID'] = $result['ID'];
        $_SESSION['profile_pic'] = $result['user_picture'];
        $_SESSION['tupv_id'] = $result['tupv_id'];
        $_SESSION['username'] = $result['username'];
        $_SESSION['password'] = $result['password'];
        $_SESSION['full_name'] = $result['full_name'];
        $_SESSION['department'] = $result['department'];
        $_SESSION['type'] = $result['type'];
        header('location: ../user/');
        exit(0);
    } else {
        $_SESSION['invalid'] = "Invalid Username or Password";
        header("Location: ../");
        exit(0);
    }
}
?>