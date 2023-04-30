<?php

session_start();
include('includes/db_connection.php');

include('includes/doctor.php');

// select all patients from the Patient table
$sql = "SELECT * FROM Patient";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
  <title>Patient List</title>
  <!-- load Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Patient List</h1>
    <table class="table">
      <thead>
        <tr>
          <th>Patient ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Date of Birth</th>
          <th>Gender</th>
          <th>Contact Info</th>
          <th>Registration Date</th>
          <th>Registration Time</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // loop through the result set and output the data in rows
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["patient_id"] . "</td>";
            echo "<td>" . $row["first_name"] . "</td>";
            echo "<td>" . $row["last_name"] . "</td>";
            echo "<td>" . $row["date_of_birth"] . "</td>";
            echo "<td>" . $row["gender"] . "</td>";
            echo "<td>" . $row["contact_info"] . "</td>";
            echo "<td>" . $row["registration_date"] . "</td>";
            echo "<td>" . $row["registration_time"] . "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='8'>No patients found.</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
  <!-- load Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// close database connection
$conn->close();
?>
