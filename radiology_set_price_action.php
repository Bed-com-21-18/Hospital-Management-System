<?php
include 'user_regdb.php';

// Check if the user is logged in
if (isset($_SESSION['id']) && isset($_SESSION['uname'])) {
    include "unavbar.php";
    include "comfig.php";
    
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form data
        $testName = $_POST['test_name'];
        $price = $_POST['price'];

        // Check if the test_name already exists in the laboratory table
        $stmt = $mysqli->prepare("SELECT test_name FROM laboratory WHERE test_name = ?");
        $stmt->bind_param("s", $testName);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // If the test_name exists, update the record
            $stmt = $mysqli->prepare("UPDATE laboratory SET price = ? WHERE test_name = ?");
            $stmt->bind_param("ds", $price, $testName);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                        // Redirect to the form page with appropriate message
        header("Location: radiology_set_price.php?success=$testName updated successfully.");
        exit();
            
            } else {
                        // Redirect to the form page with appropriate message
                        header("Location: radiology_set_price.php?error=Error updating $testName.");
                        exit();
            }
        } else {
            // If the test_name does not exist, insert a new record
            $stmt = $mysqli->prepare("INSERT INTO laboratory (test_name, price) VALUES (?, ?)");
            $stmt->bind_param("sd", $testName, $price);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                        // Redirect to the form page with appropriate message
        header("Location: radiology_set_price.php?success=$testName added successfully.");
        exit();
            
            } else {
                header("Location: radiology_set_price.php?error=Error adding $testName.");
        exit();
            
            }
            
        }

        
    }
} else {
    header("Location: home.php");
    exit();
}
?>
