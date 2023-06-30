<?php
include "comfig.php";

// Initialize variables for error/success messages
$errorMessage = "";
$successMessage = "";

// If the user has submitted the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the drug ID, name, price, and status from the form
    $id = $_POST['drug_id'];
    $drug_name = $_POST['drug_name'];
    $drug_price = $_POST['drug_price'];
    $status = $_POST['status'];

    // Check if the drug exists in the database
    $check_sql = "SELECT * FROM drug WHERE id = '$$id'";
    $check_result = $mysqli->query($check_sql);

    if ($check_result->num_rows > 0) {
        // Update the drug in the database
        $sql = "UPDATE drug SET drug_name = '$drug_name', drug_price2 = '$drug_price', status = '$status' WHERE id = '$id'";
        if ($mysqli->query($sql) === TRUE) {
            // Set success message
            $successMessage = "Drug updated successfully!";
        } else {
            // Set error message
            $errorMessage = "Failed to update drug.";
        }
    } else {
        // Set error message
        $errorMessage = "Drug does not exist in the database.";
    }
}

// Close the database connection
$mysqli->close();
?>

