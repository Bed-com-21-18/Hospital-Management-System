<?php
session_start();
include "comfig.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $patient_id = $_POST['patient_id'];
  $ward_bed = $_POST['ward_bed'];
  $room_number = $_POST['room_number'];
  $treatment_plan = $_POST['treatment_plan'];

  // Check if the user is logged in
  if (isset($_SESSION['uname'])) {
    $usernam = $_SESSION['uname'];
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
    // Combine ward and room number with a colon separator
    $ward_room = $ward_bed . ':' . $room_number;

    // Prepare the SQL query to update the ward_bed and treatment_plan in the patient table
    $updateSql = "UPDATE patient SET ward_bed = ?, treatment_plan = ? WHERE id = ?";

    // Create a prepared statement for the update query
    $updateStmt = $mysqli->prepare($updateSql);

    // Check if the prepared statement was created successfully
    if ($updateStmt === false) {
      $response = '<div class="alert alert-danger" role="alert">
        Error: Unable to create a prepared statement. Please try again.
        <br>
        <br><button class="btn btn-danger" onclick="history.back()">Go Back</button>
      </div>';
    } else {
      // Bind the parameters for the update query
      $updateStmt->bind_param("sss", $ward_room, $treatment_plan, $patient_id);

      // Execute the update query
      if ($updateStmt->execute()) {
        // Set a success message if the update was successful
        $message = 'Success: The status request for '.$_SESSION['name']. ' .';

        // Set the session message and redirect back to send_to_lab.php
        $_SESSION['message'] = $message;
        $_SESSION['symptoms'] = $treatment_plan;

        echo "<script>alert('Successfully Added to Inpatient');
          window.location.href = 'patient_list_user.php';
          </script>";
        exit();
      } else {
        // Display an error message if the update query fails
        $response = '<div class="alert alert-danger" role="alert">
          Error: Failed to update data. Please try again.
          <br>
          <br><button class="btn btn-danger" onclick="history.back()">Go Back</button>
        </div>';
      }
    }
  }

  // Close the database connection
  mysqli_close($mysqli);

  // Output the response
  echo $response;
}
?>
