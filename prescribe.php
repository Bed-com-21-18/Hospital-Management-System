<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prescription Summary</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-sm-12">
        <?php
        session_start();
        if (!isset($_SESSION['username'])) {
          // User is not authenticated, redirect to login page
          header("Location: ../hms/login.php");
          exit();
        }
        // Connect to the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "hospital";
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $patient_id = $_POST["patient_id"];
          $medical_history = $_POST["medical-history"]; // This is an array
          $symptoms = $_POST["symptoms"]; // This is an array
          $others = $_POST["others"];
          

          // Prepare and execute the query
          $stmt = $conn->prepare("SELECT * FROM patient WHERE id = ?");
          $stmt->bind_param("i", $patient_id);
          $result = $stmt->execute();

          if ($result === false) {
            // Display an error message if the query execution failed
            echo "<div class='alert alert-danger' role='alert'>Error: " . $stmt->error . "</div>";
          
          
          } else {
            
            // Display the patient details if the query execution succeeded
            $patient = $stmt->get_result()->fetch_assoc();
            echo "<h1 class='mb-4'>Prescription Summary</h1>";
echo "<h4 class='mb-3'>Section A: Patient Details</h4>";
echo "<div class='table-responsive'>";
echo "<table class='table table-bordered'>";
echo "<tbody>";
echo "<tr><td><strong>Name:</strong></td><td>" . $patient["name"] . "</td></tr>";
echo "<tr><td><strong>Email:</strong></td><td>" . $patient["email"] . "</td></tr>";
echo "<tr><td><strong>Phone number:</strong></td><td>" . $patient["phoneNumber"] . "</td></tr>";
echo "<tr><td><strong>Age:</strong></td><td>" . $patient["age"] . "</td></tr>";
echo "<tr><td><strong>Gender:</strong></td><td>" . $patient["gender"] . "</td></tr>";
echo "<tr><td><strong>District:</strong></td><td>" . $patient["district"] . "</td></tr>";
echo "<tr><td><strong>Village:</strong></td><td>" . $patient["village"] . "</td></tr>";
echo "<tr><td><strong>Residential:</strong></td><td>" . $patient["residential"] . "</td></tr>";
echo "</tbody>";
echo "</table>";
echo "</div>";

          }

          echo "<h4 class='mb-3'>Section B: Medical History</h4>";
          echo "<div class='row mb-3'>";
          echo "<div class='col-sm-12'><strong>Medical History:</strong></div>";
          echo "<div class='col-sm-12'>";
          echo "<table class='table table-bordered'>";
          echo "<tbody>";
          if (!empty($medical_history)) {
            foreach ($medical_history as $history) {
              echo "<tr><td>" . $history . "</td></tr>";
            }
          } else {
            echo "<tr><td>None</td></tr>";
          }
          echo "</tbody>";
          echo "</table>";
          echo "</div>";
          echo "</div>";
          
          echo "<div class='row mb-3'>";echo "<div class='col-sm-12'><strong>Current Symptoms and its Drugs</strong></div>";
          echo "<div class='col-sm-12'>";
          if (!empty($symptoms)) {
            echo "<table class='table'>";
            echo "<thead><tr><th>Symptom</th><th>Drugs</th></tr></thead>";
            echo "<tbody>";
            foreach ($symptoms as $symptom) {
              // Query the database for drugs associated with this symptom
              $sql = "SELECT drug_name FROM drug WHERE symptoms LIKE '%" . $symptom . "%'";
              $result = mysqli_query($conn, $sql);
          
              // If there are matching drugs, display them
              if (mysqli_num_rows($result) > 0) {
                echo "<tr><td>" . $symptom . "</td><td><ul>";
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<li>" . $row['drug_name'] . "</li>";
                }
                echo "</ul></td></tr>";
              } else {
                echo "<tr><td>" . $symptom . "</td><td>No matching drugs found.</td></tr>";
              }
            }
            echo "</tbody></table>";
          } else {
            echo "None";
          }
          echo "</div>";
          
          
echo "</div>";
echo "</div>";


}

if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  $stmt = $conn->prepare("SELECT * FROM doctor WHERE uname = ?");
  $stmt->bind_param("s", $username);
  $result = $stmt->execute();

  if ($result === false) {
    // Display an error message if the query execution failed
    echo "<div class='alert alert-danger' role='alert'>Error: " . $stmt->error . "</div>";
  } else {
    // Display the doctor's username if the query execution succeeded
    $doctor = $stmt->get_result()->fetch_assoc();
    $prescribed_on = date("H:i:s d-m-Y ");
    echo "<div class='col-sm-12'>";
    echo "</div>";
    echo "<p class='list-group-item'><b style='color: green;'>Prescribed by</b><b> " . $doctor['uname'] . "</b>&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  <b style='color: green;'>Prescribed at </b><b>".$prescribed_on." </b></p>";
 echo "</div>";
    // Update patient table with prescription details
  $prescribed_by = $doctor['uname'];
  
  $stmt = $conn->prepare("UPDATE patient SET prescribed_by=?, prescribed_on=? WHERE id=?");
  $stmt->bind_param("ssi", $prescribed_by, $prescribed_on, $patient_id);
  $stmt->execute();


  }
}echo "<br>";
echo "<div style='text-align:center;'>";
echo "<button class='btn btn-primary mb-3' onclick='window.location.href=\"billing.php\"'>Send to Billing</button>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<button class='btn btn-danger mb-3' onclick='window.history.back()'>Cancel</button>";
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
</html>



