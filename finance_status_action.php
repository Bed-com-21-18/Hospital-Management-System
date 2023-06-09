<?php
include "comfig.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $patient_id = $_POST['patient_id'];
  $status = $_POST['status'];
  
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
    $response = '<div class="alert alert-danger" role="alert">
      Error: The patient ID does not exist. Please make sure you have entered the ID of a registered patient.
      <br>
      <br><button class="btn btn-danger" onclick="history.back()">Go Back</button>
    </div>';
  } else {
    // Prepare the SQL query to insert the statuss data into the database
    $sql = "UPDATE patient SET status = ? WHERE id = ?";

    // Create a prepared statement
    $stmt = $mysqli->prepare($sql);

    // Bind the parameters
    $stmt->bind_param("ss", $status, $patient_id);

    // Execute the SQL query
if ($stmt->execute()) {
    // Set the session message and redirect back to send_to_lab.php
    echo "<script>alert('Successfully Cleared');
            window.location.href = 'finance.php';
            </script>";
    
  } else {
    // Display an error message if the statuss data could not be updated
    $response = '<div class="alert alert-danger" role="alert">
      Error: ' . $sql . '<br>' . mysqli_error($mysqli) . '
      <button class="btn btn-danger" onclick="history.back()">Go Back</button>
    </div>';
  
    // Output the response
    echo $response;
  }
  
  }

  // Close the database mysqliection
  mysqli_close($mysqli);

  // Output the response
  echo $response;
}
?>
