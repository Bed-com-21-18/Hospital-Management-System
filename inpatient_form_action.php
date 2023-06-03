<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $patient_id = $_POST['patient_id'];
  $ward_bed = $_POST['ward_bed'];
  $treatment_plan = $_POST['treatment_plan'];
  // Connect to the database
  $host = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'hms';
  $conn = mysqli_connect($host, $username, $password, $database);

  // Check if the connection was successful
  if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
  }

  // Check if the user is logged in
  if (isset($_SESSION['uname'])) {
    $usernam = $_SESSION['uname'];
  }

  // Check if the patient ID exists in the patient table
  $sql = "SELECT * FROM patient WHERE id = ?";
  $stmt = $conn->prepare($sql);
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
   // Prepare the SQL query to update the status and drug_given_by data in the patient table
$sql = "UPDATE patient SET ward_bed = ?, treatment_plan = ? WHERE id = ?";


// Create a prepared statement
$stmt = $conn->prepare($sql);

// Bind the parameters
                                  $stmt->bind_param("sss", $ward_bed, $treatment_plan, $patient_id);


    // Execute the SQL query
if ($stmt->execute()) {
    // Set a success message if the statuss data was successfully updated
    $message = 'Success: The status request for '.$_SESSION['name']. ' .';
  
    // Set the session message and redirect back to send_to_lab.php
    $_SESSION['message'] = $message;
    $_SESSION['symptoms'] = $symptoms;

    echo "<script>alert('Successfully Added to In patient');
    window.location.href = 'inpatient.php';
    </script>";
    // header('Location: inpatient.php ');
    exit();
  } else {
    // Display an error message if the statuss data could not be updated
    $response = '<div class="alert alert-danger" role="alert">
      Error: ' . $sql . '<br>' . mysqli_error($conn) . '
      <button class="btn btn-danger" onclick="history.back()">Go Back</button>
    </div>';
  
    // Output the response
    echo $response;
  }
  
  }

  // Close the database connection
  mysqli_close($conn);

  // Output the response
  echo $response;
}
?>
