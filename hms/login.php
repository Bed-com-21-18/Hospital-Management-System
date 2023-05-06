<?php
session_start();
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Create database connection
    $conn = new mysqli('localhost', 'root', '', 'hospital');

    // Check if connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL query
    $sql = "SELECT * FROM user WHERE uname='" . $_POST['username'] . "' AND pwd='" . $_POST['password'] . "'";
    $result = $conn->query($sql);
        // Check if query was successful
    if($result->num_rows === 1) {
        // Login successful, redirect to dashboard
        
        header("Location: appointment.php");
        $_SESSION['username'] =  $_POST['username'];
        exit();
    } else {
        // Login unsuccessful, display error message
        echo "Invalid username or password.";
    }

    // Close database connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctor Login</title>
</head>
<body>
    <h1>Doctor Login</h1>
    <form method="POST">
        <label>Username:</label><br>
        <input type="text" name="username" required><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br>
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>
