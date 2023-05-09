<?php

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hms";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// If the user has submitted the form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the drug name, symptoms, and price from the form
    $drug_name = $_POST['drug_name'];
    $symptoms = $_POST['symptoms'];
    $drug_price = $_POST['drug_price'];
    $dosage = $_POST['dosage'];
    $status = $_POST['status'];
    $patient_type = $_POST['patient_type'];
    
    // Set default values for price and dosage based on patient type
    if ($patient_type === "Adult"){
        $drug_price2 = $drug_price +400;
        $dosage2 = "1 morning, afternoon and evening";
    } else {
        $drug_price2 = $drug_price - 200;
        $dosage2 = "2 morning, afternoon and evening";
    }
    
    // Check if drug already exists in the database
    $check_sql = "SELECT * FROM drug WHERE drug_name = '$drug_name'";
    $check_result = $conn->query($check_sql);
        
    if ($check_result->num_rows > 0) {
        // Update the drug in the database
        $sql = "INSERT INTO drug  (drug_name = '$drug_name', symptoms = '$symptoms', drug_price = '$drug_price', drug_price2 = '$drug_price2', dosage = '$dosage', dosage2 = '$dosage2', status = '$status' WHERE drug_name = '$drug_name')";
          
        if ($conn->query($sql) === TRUE) {
            echo "Drug inserted successfully!";
        } else {
            echo "Error updating drug: " . $conn->error;
        }
          
    } else {
        // Insert the drug into the database
        $sql = "INSERT INTO drug (drug_name, symptoms, drug_price, drug_price2, dosage, dosage2, status) VALUES ('$drug_name', '$symptoms', '$drug_price', '$drug_price2', '$dosage', '$dosage2', '$status')";
          
        if ($conn->query($sql) === TRUE) {
            echo "Drug added successfully!";
        } else {
            echo "Error adding drug: " . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();

?>
