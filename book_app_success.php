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
        $patient_id = $_SESSION['patient_id'];
          echo "<div class='alert alert-success' role='alert'>";
          echo "<i class='fas fa-check-circle'></i><b> Appointment booked successfully</b>";
          echo "</div>";          
          echo "<h4 class='mb-3'><b>Appointment Details</b></h4>";
          // Prepare and execute the query
            $patient_id = $_SESSION['patient_id'];
            $sql = "SELECT * FROM appointments WHERE patient_id='$patient_id' ORDER BY id DESC LIMIT 1";
            $result = $mysqli->query($sql);
                $row = $result->fetch_assoc();
                $name = $row['name'];
                $date = $row['date'];
                $time = $row['time'];
                $doctor =  $row['professional'];
                $reason=  $row['reason'];
                $booked_by = $row['booked_by'];
                echo "<div class='container'>";
                echo "<div class='row'>";
                echo "<table class='table'>";
                echo "<tr><td><strong>Name of the patient</strong></td><td>" .$name. "</td></tr>";
                echo "<tr><td><strong>Preferred Doctor to meet patient</strong></td><td>" .$doctor. "</td></tr>";
                echo "<tr><td><strong>Reason for appointment</strong></td><td>" .$reason. "</td></tr>";
                echo "<tr><td><strong>Date to meet Doctor</strong></td><td>" .$date. " at ".$time."</td></tr>";
                echo "<tr><td><strong>Preferred Doctor to meet patient</strong></td><td>" .$doctor. "</td></tr>";
                echo "<tr><td><strong>Booked By</strong></td><td>" .$booked_by. "</td></tr>";
                echo "</table>";
                echo "</div>";
                echo "</div>";
                echo "<br>";
                echo "<div style='text-align:center;'>";
                echo "<button class='btn btn-primary mb-3' onclick='window.location.href=\"nurse_dashboard.php\"'>Go to Dashboard</button>";
                echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                echo "<button class='btn btn-secondary mb-3' onclick='window.history.back()'>Book Again</button>";
                echo "</div>";


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
