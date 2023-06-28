<?php 
    include 'doctor_regdb.php';
    include "comfig.php";
    include "dnavbar.php";
    if (isset($_SESSION['id']) && isset($_SESSION['uname'])){

?>
        <!DOCTYPE html>
<html>
<head>
  <title>Appointments List</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <br>
    <br>
    <br>
    
  <div class="container-fluid bg-light">
   
    <?php
 
    if (isset($_SESSION['uname'])) {
        $username = $_SESSION['uname'];
    }
    else {
        header("Location: doctor_login.php?error=You Logged out from session, Login again");
        exit();
   }
   
    $sql = "SELECT * FROM doctor WHERE uname = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $_SESSION['uname']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = mysqli_fetch_assoc($result);
        $professional = $row['prof'];

        // Prepare the SQL query to retrieve appointments
        $sql = "SELECT * FROM appointments WHERE professional = ? ORDER BY id DESC";
        $stmt = $mysqli->prepare($sql);
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
            echo '<th>Patient Name</th>';
            echo '<th>Date Booked</th>';
            echo '<th>Time Booked</th>';
            echo '<th>Professional</th>';
            echo '<th>Booked by</th>';
            echo '<th>Time / Date Booked</th>';
            echo '<th>Status</th>';
            echo '<th>Reason</th>';
            echo '<th>Action</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
            ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['time']; ?></td>
                    <td><?php echo $row['professional']; ?></td>
                    <td><?php echo $row['booked_by']; ?></td>
                    <td><?php echo $row['booked_at']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><?php echo $row['reason']; ?></td>
                    <td class='btn-group btn-group-justfied'>
                        <a href='prescribe_form.php?viewing=<?php echo $row["patient_id"]; ?>&id=<?php echo $row["id"]; ?>' class='badge bg-primary'>Prescribe</a>
                    </td>
                </tr>
            <?php
            }
             echo '</tbody>';
            echo '</table>';

            echo '</div> <br><br><br><br><br><br><br><br><br><br><br>';
        } else {
            echo '<div class="alert alert-info" role="alert">No appointments found.</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Error: No doctor found with the given username.</div>';
    }

    // Close the database connection
    mysqli_close($mysqli);
    
    ?>
  </div>
  <br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>
<?php 
    }else {
        header("Location: home.php");
        exit();
    }
?> 