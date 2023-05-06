<!DOCTYPE html>
<html>
<head>
  <title>Appointments</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">

    <?php
    // Connect to the database
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'hospital';
    $conn = mysqli_connect($host, $username, $password, $database);

    // Check if the connection was successful
    if (!$conn) {
      die('Connection failed: ' . mysqli_connect_error());
    }

    // Prepare the SQL query to retrieve appointments
    $sql = "SELECT * FROM appointments ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);

    // Check if appointments were found
    if (mysqli_num_rows($result) > 0) {
      // Display appointments in a table
       // Display appointments in a table

       echo '<h1>Appointments List</h1>';
       echo '<div class="table-responsive">';
       echo '<table class="table table-striped table-hover">';
       echo '<thead class="thead-light">';
       echo '<tr>';
       echo '<th>Appoint No.</th>';
       echo '<th>Patient ID</th>';
       echo '<th>Date</th>';
       echo '<th>Time</th>';
       echo '<th>Professional</th>';
       echo '<th>Booked by</th>';
       echo '<th>Time / Date Booked</th>';
       echo '<th>Status</th>';
       echo '<th>Reason</th>';
       echo '</tr>';
       echo '</thead>';
       echo '<tbody>';
       while ($row = mysqli_fetch_assoc($result)) {
           echo '<tr>';
           echo '<td>' . $row['id'] . '</td>';
           echo '<td>' . $row['patient_id'] . '</td>';
           echo '<td>' . $row['date'] . '</td>';
           echo '<td>' . $row['time'] . '</td>';
           echo '<td>' . $row['professional'] . '</td>';
           echo '<td>' . $row['booked_by'] . '</td>';
           echo '<td>' . $row['booked_at'] . '</td>';
           echo '<td>' . $row['status'] . '</td>';
           echo '<td>' . $row['reason'] . '</td>';
           echo '</tr>';
      }
      echo '</tbody>';
      echo '</table>';      echo '</div>';
    } else {
      echo '<div class="alert alert-info" role="alert">No appointments found.</div>';
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
  </div>
</body>
</html>
