<?php
session_start();

include "comfig.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $patient_id = $_POST['patient_id'];
  $results = $_POST['results'];
  $test = $_POST['test'];

  // Check if the user is logged in
  if (isset($_SESSION['uname'])) {
    $username = $_SESSION['uname'];
  }

  // Check if the patient ID exists in the patient table
  $sql = "SELECT * FROM patient WHERE id = ?";
  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param("s", $patient_id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 0) {
    // Display an error message if the patient ID does not exist in the patient table
    header("Location: lab_form.php?respond=$patient_id&test=$test&error=The patient does not exist. Please make sure you have entered the ID of a registered patient.");
    exit();
  } else {
    // Fetch the lab price from the laboratory table based on the test name
    $sql = "SELECT price FROM laboratory WHERE test_name = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $test);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
      // Display an error message if the test name does not exist in the laboratory table
      header("Location: lab_form.php?respond=$patient_id&test=$test&error=The test does not exist in the laboratory.");
      exit();
    }
    
    // Fetch the associated price
    $row = $result->fetch_assoc();
    $lab_price = $row['price'];

    // Prepare the SQL query to update the patient table with the lab price and results
    $sql = "UPDATE patient SET lab_results = ?, lab_price = ? WHERE id = ?";

    // Create a prepared statement
    $stmt = $mysqli->prepare($sql);

    // Bind the parameters
    $stmt->bind_param("sss", $results, $lab_price, $patient_id);

    // Execute the SQL query
    if ($stmt->execute()) {
      // Display a success message if the results were successfully sent
      echo "<script>alert('Successfully Submitted');
      window.location.href = 'laboratory.php';
      </script>";
    } else {
      // Display an error message if there was an error executing the SQL query
      header("Location: lab_form.php?respond=$patient_id&test=$test&error=Error: " . $stmt->error);
    }
  }

  // Close the database connection
  $stmt->close();
  $mysqli->close();
  exit();
}
?>
