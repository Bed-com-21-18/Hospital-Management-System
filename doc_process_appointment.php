<?php
include 'doctor_regdb.php';
include 'comfig.php';
if (isset($_SESSION['id']) && isset($_SESSION['uname'])){

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $patient_id = $_POST['patient_id'];
  $_SESSION['patient_id'] = $patient_id;
  $name = $_POST['name'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $professional = $_POST['professional'];
  $reason = $_POST['reason'];
  $booked_at = date("H:i:s d-m-Y ");

  // Connect to the database
  $host = 'localhost';
  $usernam = 'root';
  $password = '';
  $database = 'hms';
  $conn = mysqli_connect($host, $usernam, $password, $database);

  // Check if the connection was successful
  if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
  }

  // Check if the user is logged in
    $username = $_SESSION['uname'];
  

  // Check if the patient ID exists in the patient table
  $sql = "SELECT * FROM patient WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $patient_id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 0) {
    // Display an error message if the patient ID does not exist in the patient table
    echo '<div class="alert alert-danger" role="alert">
      Error: The patient ID does not exist. Please make sure the you have entered the ID of registered patient.
      <br>
      <br><button class="btn btn-danger" onclick="history.back()">Go Back</button>
    </div>';
  } else {
// Prepare the SQL query to insert the appointment data into the database
$sql = "INSERT INTO appointments (patient_id, name, date, time, professional, reason, booked_by, booked_at)
VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

// Create a prepared statement
$stmt = $conn->prepare($sql);

// Bind the parameters
$stmt->bind_param("ssssssss", $patient_id, $name, $date, $time, $professional, $reason, $username, $booked_at);


// Execute the SQL query
$result = $stmt->execute();

    if ($result === TRUE) {
      // Redirect the user to the dashboard page upon successful appointment booking
     
      header("Location: doc_book_app_success.php");
      exit;
    } else {
      // Display an error message if the appointment booking failed
      echo '<div class="alert alert-danger" role="alert">
        Error: ' . $sql . '<br>' . mysqli_error($conn) . '
        <button class="btn btn-danger" onclick="history.back()">Go Back</button>
      </div>';
    }
  }

  // Close the database connection
  mysqli_close($conn);
}
}else {
  header("Location: home.php");
  exit();
}
?> 