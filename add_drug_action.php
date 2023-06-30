<?php
include "comfig.php";
// Get the drug name, price, and status from the form
$drug_name = $_POST['drug_name'];
$drug_price = $_POST['drug_price'];
$status = $_POST['status'];

// Check if drug already exists in the database
$check_sql = "SELECT * FROM drug WHERE drug_name = '$drug_name'";
$check_result = $mysqli->query($check_sql);

if ($check_result->num_rows > 0) {
    header('Location: add_drug.php?error=Drug already exists');
    exit();
} else {
    // Insert the drug into the database
    $sql = "INSERT INTO drug (drug_name, drug_price2, status) VALUES ('$drug_name', '$drug_price', '$status')";

    if ($mysqli->query($sql) === TRUE) {
        header('Location: add_drug.php?success=Drug added successfully');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
}

// Close the database mysqliection
$mysqli->close();
?>
