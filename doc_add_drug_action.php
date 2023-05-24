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


    // Get the drug name, price, and status from the form
    $drug_name = $_POST['drug_name'];
    $drug_price = $_POST['drug_price'];
    $status = $_POST['status'];

    // Check if drug already exists in the database
    $check_sql = "SELECT * FROM drug WHERE drug_name = '$drug_name'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        header('Location: doc_added_unsuccess.php');
        exit();
    } else {
        // Insert the drug into the database
        $sql = "INSERT INTO drug (drug_name, drug_price2, status) VALUES ('$drug_name', '$drug_price', '$status')";

        if ($conn->query($sql) === TRUE) {
            header('Location: doc_added_success.php');
            exit();
        } else {
          ini_set('display_errors', 1);
          ini_set('display_startup_errors', 1);
          error_reporting(E_ALL);
          
        }
    }


// Close the database connection
$conn->close();
?>
