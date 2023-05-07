<?php
//   session_start();
//   include "comfig.php";
// Retrieve form data
$patient_id = $_POST['patient_id'];
$drug_id = $_POST['drug_id'];
$drug_name = $_POST['drug_name'];
$drug_quantity = $_POST['drug_quantity'];
$prescription_fee = $_POST['prescription_fee'];
$billing_date = $_POST['billing_date'];

// Perform necessary validations and sanitizations

// Connect to the database 
// initialize the mysqli object with proper credentials
$mysqli = new mysqli("localhost", "root", "", "hms");

// check if there is an error in connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Insert the data into the billing table
$sql = "INSERT INTO `billing` (patient_id, drug_id, drug_name, drug_quantity, prescription_fee, billing_date)
        VALUES ('$patient_id', '$drug_id', '$drug_name', '$drug_quantity', '$prescription_fee', '$billing_date')";

if ($mysqli->query($sql) === TRUE) {
    echo "Billing information inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

// Close the database connection
$mysqli->close();

