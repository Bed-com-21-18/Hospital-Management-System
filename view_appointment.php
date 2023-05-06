
<?php
    session_start();
            include "dnavbar.php";
        ?>
        <!DOCTYPE html>
<html>
<head>
  <title>Appointments List</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
   
    <?php
 
    if (isset($_SESSION['uname'])) {
        $username = $_SESSION['uname'];
    }
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

    $sql = "SELECT * FROM doctor WHERE uname = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_SESSION['uname']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = mysqli_fetch_assoc($result);
        $professional = $row['prof'];

        // Prepare the SQL query to retrieve appointments
        $sql = "SELECT * FROM appointments WHERE professional = ? ORDER BY id DESC";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $professional);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if appointments were found
        if ($result->num_rows > 0) {
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
            echo '</table>';
            echo '</div>';
        } else {
            echo '<div class="alert alert-info" role="alert">No appointments found.</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Error: No doctor found with the given username.</div>';
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
  </div>
</body>

<?php
 
            include "footer.php";
        ?>
</html>
