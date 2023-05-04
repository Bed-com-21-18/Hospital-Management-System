<?php

$drug_fee = "";
// Retrieve form data
$drug_name = $_POST['drug_name'];
$drug_fee = $_POST['drug_fee'];
$prescription_fee = $_POST['prescription_fee'];

// Perform necessary validations and sanitizations

// Connect to the database 
$mysqli = new mysqli("localhost", "root", "", "hms");

// Check if there is an error in connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Insert the data into the drugs table
$sql = "INSERT INTO `drugs` (drug_name, drug_fee, prescription_fee)
        VALUES ('$drug_name', '$drug_fee', '$prescription_fee')";

if ($mysqli->query($sql) === TRUE) {
    echo "Drug information inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

// Close the database connection
$mysqli->close();
?>
