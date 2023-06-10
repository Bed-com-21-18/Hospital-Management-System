<?php
session_start();
include "comfig.php";

if (isset($_POST['uname']) && isset($_POST['pwd'])) {

    // Validation
    function validate($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pwd = validate($_POST['pwd']);

    // Hashing password
    $pwd = md5($pwd);

    // Check in admins table
    $admin_sql = "SELECT * FROM admins WHERE uname='$uname' AND pwd='$pwd'";
    $admin_result = $mysqli->query($admin_sql);

    if ($admin_result->num_rows === 1) {
        $admin_row = $admin_result->fetch_assoc();
        $_SESSION['uname'] = $admin_row['uname'];
        $_SESSION['prof'] = $admin_row['prof'];
        $_SESSION['id'] = $admin_row['id'];
        header("Location: dashboard.php");
        exit();
    } else {
        // Check in doctor table
        $doctor_sql = "SELECT * FROM doctor WHERE uname='$uname' AND pwd='$pwd'";
        $doctor_result = $mysqli->query($doctor_sql);

        if ($doctor_result->num_rows === 1) {
            $doctor_row = $doctor_result->fetch_assoc();
            $_SESSION['uname'] = $doctor_row['uname'];
            $_SESSION['username'] = $doctor_row['username'];
            $_SESSION['prof'] = $doctor_row['prof'];
            $_SESSION['id'] = $doctor_row['id'];
            header("Location: doc_dashboard.php");
            exit();
        } else {
            // Check in users table
            $users_sql = "SELECT * FROM user WHERE uname='$uname' AND pwd='$pwd'";
            $users_result = $mysqli->query($users_sql);

            if ($users_result->num_rows === 1) {
                $users_row = $users_result->fetch_assoc();
                $_SESSION['uname'] = $users_row['uname'];
                $_SESSION['prof'] = $users_row['prof'];
                $_SESSION['id'] = $users_row['id'];
                header("Location: nurse_dashboard.php?");
                exit();
            } else {
                // Invalid credentials, redirect back to login page
                header("Location: users_login.php?error=Invalid login details");
                exit();
            }
        }
    }
}
?>
