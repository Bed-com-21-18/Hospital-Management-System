<?php
include 'user_regdb.php';
if (isset($_SESSION['id']) && isset($_SESSION['uname'])){
  include "unavbar.php";
  include "comfig.php";
        ?> 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booked Successfully</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-sm-12">
        <?php
        if (!isset($_SESSION['uname'])) {
          // User is not authenticated, redirect to login page
          header("Location: user_login.php");
          exit();
        }

        if (!isset($_SESSION['patient_id'])) {
          // Patient ID is not available in session, display an error message
          echo "<div class='alert alert-danger' role='alert'>Error: Patient ID not found.</div>";
          exit();
        }

        $patient_id = $_SESSION['patient_id'];
        // Connect to the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "hms";
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }


          $patient_id = $_SESSION['patient_id'];
          
          // Prepare and execute the query
          $stmt = $conn->prepare("SELECT * FROM patient WHERE id = ? ORDER BY id DESC");
          $stmt->bind_param("i", $patient_id);
          $result = $stmt->execute();
          
          if (!$result) {
          // Display an error message if the query execution failed
          echo "<div class='alert alert-danger' role='alert'>Error: " . $stmt->error . "</div>";
          exit(); // terminate the script execution if there was an error
          }
          
          // Fetch the patient details
          $patient = $stmt->get_result()->fetch_assoc();
          
          if (!$patient) {
          // Display an error message if no patient was found with the given ID
          echo "<div class='alert alert-danger' role='alert'>Error: No patient found with ID " . $patient_id . "</div>";
          exit(); // terminate the script execution if no patient was found
          }
          
          // Display the patient details if the query execution succeeded
          echo "<div class='alert alert-success' role='alert'>";
          echo "<i class='fas fa-check-circle'></i><b> Appointment booked successfully</b>";
          echo "</div>";          
          echo "<h4 class='mb-3'><b>Appointment Details</b></h4>";
          // Prepare and execute the query
          if(isset($_SESSION['patient_id'])){
            $patient_id = $_SESSION['patient_id'];
            $stmt2 = $conn->prepare("SELECT professional, reason FROM appointments WHERE patient_id = ? ORDER BY id DESC");
            $stmt2->bind_param("i", $patient_id);
            if($stmt2->execute()){
              $appoint = $stmt2->get_result()->fetch_assoc();
              if($appoint){
                echo "<div class='container'>";
                echo "<div class='row'>";
                echo "<table class='table'>";
                echo "<tr><td><strong>Preferred Doctor to meet patient</strong></td><td>" . $appoint["professional"] . "</td></tr>";
                echo "<tr><td><strong>Reason for appointment</strong></td><td>" . $appoint["reason"] . "</td></tr>";
                echo "</table>";
                echo "</div>";
                echo "</div>";
              } else {
                echo "No preferred doctor found.";
              }
            } else {
              echo "Error executing query: " . $stmt2->error;
            }
          } else {
            echo "Invalid Patient ID";
          }



if (isset($_SESSION['uname'])) {
  $username = $_SESSION['uname'];
  $stmt = $conn->prepare("SELECT * FROM user WHERE uname = ?");
  $stmt->bind_param("s", $username);
  $result = $stmt->execute();

  if ($result === false) {
    // Display an error message if the query execution failed
    echo "<div class='alert alert-danger' role='alert'>Error: " . $stmt->error . "</div>";
  } else {
    // Display the doctor's username if the query execution succeeded
    $doctor = $stmt->get_result()->fetch_assoc();
    $stmt = $conn->prepare("SELECT * FROM appointments WHERE patient_id = ? ORDER BY id DESC");
    $stmt->bind_param("s", $patient_id);
    $result = $stmt->execute();
    if ($result === true) {
      $booked_at = $stmt->get_result()->fetch_assoc();
      echo "<div class='col-sm-12'>";
      echo "</div>";
      echo "<p class='list-group-item'><b style='color: green;'>Booked by</b><b> " . $_SESSION['uname']. "</b>&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  <b style='color: green;'>Time </b><b>".$booked_at['booked_at']." </b></p>";
   echo "</div>";
    } else{
      echo "<div class='alert alert-danger' role='alert'>Error: " . $stmt->error . "</div>";
    }
   
 
   
   
      }
}
echo "<br>";
echo "<div style='text-align:center;'>";
echo "<button class='btn btn-primary mb-3' onclick='window.location.href=\"nurse_dashboard.php\"'>Go to Dashboard</button>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<button class='btn btn-secondary mb-3' onclick='window.history.back()'>Book Again</button>";
echo "</div>";

// Close the database connection
$conn->close();

?>
</div>
</div>
</div>

  <!-- Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<?php 
  
 include 'footer.php'; ?>   
</html>



<?php 
    }else {
        header("Location: home.php");
        exit();
    }
?> 
