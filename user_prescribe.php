
<?php
 session_start();
            include "unavbar.php";
        ?>
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
  <div class="container mt-5 bg-light">
    <div class="pat$patient">
      <div class="col-sm-12">
        <?php
 
        if (!isset($_SESSION['uname'])) {
          // User is not authenticated, redirect to login page
          header("Location: doctor_login.php");
          exit();
        }
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

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $patient_id = $_POST["patient_id"];
          $symptoms = $_POST["symptoms"]; // This is an array
          $others = $_POST["others"];
          // Store the symptoms and patient ID in session
          $_SESSION["symptoms"] = $symptoms;
          $_SESSION["patient_id"] = $patient_id;
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
            $id = $patient['id'];
            $name = $patient['name'];
            $age = $patient['age'];
            $gender = $patient['gender'];
            $date = $patient['date']; 
            echo "<h1 class='mb-4'>Prescription Summary</h1>";
              echo "<h4 class='mb-3'>Section A: Patient Details</h4>";?>
              <hr>
              <table class="table table-hover" style="overflow:auto">
                  <thead class="table table-hover">
                      <tr>
                          <th>Name</th>
                          <th>Date of Birth</th>
                          <th>Age</th>
                          <th>Gender</th>
                      </tr>
                  </thead>
                  <tbody id = "myTable">
                 
                      <tr>
                          <td><?php echo $name; ?></td>
                          <td><?php echo $date; ?></td>
                          <td><?php echo $age; ?></td> 
                          <td><?php echo $gender; ?></td> 
                          </td>
                      </tr>
                
                  </tbody>
              </table>
              
              <?php
          }
          echo "<div class='col-sm-12'><strong>Current Symptoms</strong></div>";
          echo "<div class='col-sm-12'>";
          if (!empty($symptoms)) {
            // Convert the array of symptoms to a comma-separated string
            $symptoms_string = implode(", ", $symptoms);
          
            // Update the patient table with the new symptoms string
            $update_query = "UPDATE patient SET symptoms='$symptoms_string' WHERE id=$patient_id";
            // Replace $patient_id with the actual patient ID
          
            // Execute the update query
            if ($conn->query($update_query) === TRUE) {
              // If the update is successful, display the symptoms and associated drugs in a table
              echo "<table class='table'>";
              echo "<tbody>";
              foreach ($symptoms as $symptom) {
                // Query the database for drugs associated with this symptom
                $sql = "SELECT drug_name FROM drug WHERE symptoms LIKE '%" . $symptom . "%'";
                $result = mysqli_query($conn, $sql);
          
                // If there are matching drugs, display them
                if (mysqli_num_rows($result) > 0) {
                  echo "<tr><td>" . $symptom . "</td><td><ul>";
        
                  echo "</ul></td></tr>";
                } else {
                  echo "<tr><td>" . $symptom . "</td><td>No matching drugs found.</td></tr>";
                }
              }
              echo "</tbody></table>";
            } else {
              // If the update fails, display an error message
              echo "Error updating record: " . $conn->error;
            }
          } else {
            // If no symptoms are provided, display a message in the table and clear the symptoms column in the patient table
            $update_query = "UPDATE patient SET symptoms='' WHERE id=$patient_id";
            // Replace $patient_id with the actual patient ID
          
            // Execute the update query
            if ($conn->query($update_query) === TRUE) {
              // If the update is successful, display a message in the table
              echo "None";
            } else {
              // If the update fails, display an error message
              echo "Error updating record: " . $conn->error;
            }
          } 
          if (!empty($others)) {
            // Query the database for drugs associated with this symptom
            $sql = "SELECT drug_name FROM drug WHERE symptoms LIKE '%" . $others . "%'";
            $result = mysqli_query($conn, $sql);
            
            // If there are matching drugs, display them
            if (mysqli_num_rows($result) > 0) {
              echo "<p><b> Other Symptoms: </b>" . $others . "\t&nbsp;\t&nbsp;\t&nbsp;" . $patient['drug_name'] . "</p>";
          
              // Update patient table with the extra symptoms and associated drugs
              $others_with_drugs = $others;
              while ($patient = mysqli_fetch_assoc($result)) {
                $others_with_drugs .= ", " . $patient['drug_name'];
              }
              $query = "UPDATE patient SET others='$others_with_drugs' WHERE id=$patient_id";
              $result = mysqli_query($conn, $query);
              
            } else {
              // If no matching drugs are found, display a message to the user
              echo "<p><b> Other Symptoms: </b>" . $others . " (No matching drugs found)</p>";
          
              // Update patient table with the extra symptoms
              $query = "UPDATE patient SET others='$others' WHERE id=$patient_id";
              $result = mysqli_query($conn, $query);
            }
          }
          
          echo "</div>";
          
          
echo "</div>";
echo "</div>";


}

if (isset($_SESSION['uname'])) {
  $username = $_SESSION['uname'];
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
  $appoint_status = 'Prescribed by ' . $doctor['uname'];
  $stmt = $conn->prepare("UPDATE patient SET prescribed_by=?, prescribed_on=? WHERE id=?");
  $stmt->bind_param("ssi", $prescribed_by, $prescribed_on, $patient_id);
  $stmt->execute();
  $stmt2 = $conn->prepare("UPDATE appointments SET status=? WHERE id=?");

if (!$stmt2) {
  echo '<div class="alert alert-danger" role="alert">
    Error: ' . mysqli_error($conn) . '
  </div>';
  exit;
}

$stmt2->bind_param("ss", $appoint_status, $appoint_id);

if (!$stmt2->execute()) {
  echo '<div class="alert alert-danger" role="alert">
    Error: ' . $stmt2->error . '
  </div>';
  exit;
}


  }
}echo "<br>";
echo "<div style='text-align:center;'>";
echo "<button class='btn btn-primary mb-3' onclick='window.location.href=\"Bilings/billing.php\"'>Proceed to Billing</button>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<button class='btn btn-danger mb-3' onclick='window.history.back()'>Cancel</button>";
echo "</div>";

// Close the database connection


$conn->close();

?>
</div>
</div>
</div>
<?php 
        include 'footer.php';
    ?>
  <!-- Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



