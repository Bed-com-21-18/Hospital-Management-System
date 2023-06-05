<?php
include "comfig.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $patient_id = $_POST['patient_id'];
  $test = $_POST['test_name'];

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
    header("Location: send_to_lab.php?send=$patient_id&error=The patient does not exist. Please make sure you have entered the ID of a registered patient.");
    exit();
  } else {
    // Prepare the SQL query to update the tests data in the patient table
    $sql = "UPDATE patient SET tests = ? WHERE id = ?";

    // Create a prepared statement
    $stmt = $mysqli->prepare($sql);

    // Bind the parameters
    $stmt->bind_param("ss", $test, $patient_id);

    // Execute the SQL query
    if ($stmt->execute()) {
      // Set a success message if the tests data was successfully updated
      $message = "The test request has been sent to the lab.";
      header("Location: send_to_lab.php?send=$patient_id&success=".urlencode($message));
      exit();
    } else {
      // Display an error message if there was an error updating the tests data
      $error = "Error: " . $sql . "<br>" . $mysqli->error;
      header("Location: send_to_lab.php?send=$patient_id&error=".urlencode($error));
      exit();
    }
  }
} else {
  header("Location: home.php");
  exit();
}
?>
