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
    
    if ($patient_type === "Adult"){
        // Check if drug already exists in the database
        $check_sql = "SELECT * FROM drug WHERE drug_name = '$drug_name'";
        $check_result = $conn->query($check_sql);
        
        if ($check_result->num_rows > 0) {
          echo "Drug already exists in the database!";
        } else {
          // Insert the drug into the database
          $drug_price1 = $drug_price + 500;
          $dosage1 = "2 morning, afternoon and evening";
          $sql = "INSERT INTO drug (drug_name, symptoms, drug_price,drug_price2, dosage, dosage2, status) VALUES ('$drug_name', '$symptoms', '$drug_price', '$drug_price1', '$dosage', '$dosage1', '$status')";
          
          if ($conn->query($sql) === TRUE) {
            echo "Drug added successfully!";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        }
    } else {
        // Check if drug already exists in the database
        $check_sql = "SELECT * FROM drug WHERE drug_name = '$drug_name'";
        $check_result = $conn->query($check_sql);
        
        if ($check_result->num_rows > 0) {
          echo "Drug already exists in the database!";
        } else {
          // Insert the drug into the database
          $drug_price1 = $drug_price- 100;
          $dosage1 = "1 morning, afternoon and evening";
          $sql = "INSERT INTO drug (drug_name, symptoms, drug_price,drug_price2, dosage, dosage2, status) VALUES ('$drug_name', '$symptoms', '$drug_price1', '$drug_price', '$dosage', '$dosage1', '$status')";
   
          if ($conn->query($sql) === TRUE) {
            echo "Drug added successfully!";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        }
    }
}

// Close the database connection
$conn->close();

?>
