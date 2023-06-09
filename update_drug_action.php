<?php
include "comfig.php";
// If the user has submitted the form
    // Get the drug name, symptoms, and price from the form
    $id = $_POST['drug_id'];
    $drug_name = $_POST['drug_name'];
    $drug_price = $_POST['drug_price'];
    $status = $_POST['status'];
    // Check if drug already exists in the database
    $check_sql = "SELECT * FROM drug WHERE drug_name = '$drug_name'";
    $check_result = $mysqli->query($check_sql);
        
    if ($check_result->num_rows > 0) {
        // Update the drug in the database
        $sql = "UPDATE drug SET drug_name = '$drug_name', drug_price2 = '$drug_price', status = '$status' WHERE id = '$id'";
        if ($mysqli->query($sql) === TRUE) {
            header('location: update_success.php');
            exit; // Exit to prevent further execution
        }
        else {
            header('location: update_unsuccess.php');
            exit; // Exit to prevent further execution
        }
    } else {
        // Drug doesn't exist in the database
        header('location: update_unsuccess.php');
        exit; // Exit to prevent further execution
    }


// Close the database connection
$mysqli->close();

?>
