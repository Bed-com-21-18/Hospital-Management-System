<?php
  session_start();
  include "../unavbar.php";
  include "../comfig.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dosage and Billing</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.10.0/jspdf.umd.min.js"></script>
  </head>
  <body>
    <div class="container mt-5">
      <div class="row">
        <div class="col-sm-12">
          <?php
          if (!isset($_SESSION['uname'])) {
            // User is not authenticated, redirect to login page
            header("Location: doctor_login.php");
            exit();
          }

          // retrieve the symptoms and patient ID stored in session
          $symptoms = $_SESSION["symptoms"];
          $servicefee= 1000;
          $patient_id = $_SESSION["patient_id"];

          // Prepare and execute the query
          $stmt = $mysqli->prepare("SELECT * FROM patient WHERE id = ?");
          $stmt->bind_param("i", $patient_id);
          $result = $stmt->execute();
          if ($result === false) {

            // Display an error message if the query execution failed
            echo "<div class='alert alert-danger' role='alert'>Error: " . $stmt->error . "</div>";
          } else {
            // Display the patient details if the query execution succeeded
            $patient = $stmt->get_result()->fetch_assoc();
            echo "<h1 class='mb-4'>Dosage and Billing</h1>";
            echo "<h4 class='mb-3'>Section A: Patient Details</h4>";
            echo "<div class='table-responsive'>";
            echo "<table class='table table-bordered'>";
            echo "<tbody>";
            echo "<tr><td><strong>Name:</strong></td><td>" . $patient["name"] . "</td></tr>";
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
          echo "<div class='row mb-3'>";
                        
               // Prepare the table for displaying the prescription
                echo "<div class='table-responsive'>";
                echo "<table class='table table-striped'>";
                echo "<thead>";

                // Loop through the symptoms and display the corresponding drug, dosage, and drug_price
                $age = $patient["age"];
                $patient_id = $patient["id"] ;
                $name = $patient["name"];
                if ($age <= 13) {
                    $total_amount = 0;
                    echo "<table class='table'>";
                    echo "<p class='lead'> <b>Below is billing, dosage and prescription summary for <b> $name </b> who is <strong> " . $age . " years old.</strong></b></p>";
                    echo "<thead><tr><th>Symptom</th><th>Drug Name</th><th>Dosage</th><th>Drug Price</th></tr></thead>";
                    echo "<tbody>";
    
                    foreach ($symptoms as $symptom) {
                        $stmt = $mysqli->prepare("SELECT drug_name, dosage2, drug_price2 FROM drug WHERE symptoms LIKE ?");
                        if ($stmt === false) {
                            // Display an error message if the query preparation failed
                            echo "<div class='alert alert-danger' role='alert'>Error: " . $conn->error . "</div>";
                        } else {
                            $symptom_pattern = "%{$symptom}%";
                            $stmt->bind_param("s", $symptom_pattern);
                            $result = $stmt->execute();
                            if ($result === false) {

                                // Display an error message if the query execution failed
                                echo "<div class='alert alert-danger' role='alert'>Error: " . $stmt->error . "</div>";
                            } else {
                                $rows = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
                                foreach ($rows as $row) {

                                    echo "<tr><td>" . $symptom . "</td><td>" . $row["drug_name"] . "</td><td>" . $row["dosage2"] . "</td><td>" . $row["drug_price2"] . "</td></tr>";
                                    $total_amount += $row["drug_price2"];

                                }
                    
                            }

                        }
                    }
    
                   
                } else {
                    $total_amount = 0;
                    echo "<table class='table'>"; 
                    echo "<p class='lead'> <b>Below is billing, dosage and prescription summary for <b> $name </b> who is <strong> " . $age . " years old.</strong></b></p>";
                   
                    echo "<thead><tr><th>Symptom</th><th>Drug Name</th><th>Dosage</th><th>Drug Price</th></tr></thead>";
                    echo "<tbody>";
    
                    foreach ($symptoms as $symptom) {
                        $stmt = $mysqli->prepare("SELECT drug_name, dosage, drug_price FROM drug WHERE symptoms LIKE ?");
                        if ($stmt === false) {

                            // Display an error message if the query preparation failed
                            echo "<div class='alert alert-danger' role='alert'>Error: " . $conn->error . "</div>";
                        } else {
                            $symptom_pattern = "%{$symptom}%";
                            $stmt->bind_param("s", $symptom_pattern);
                            $result = $stmt->execute();
                            if ($result === false) {

                                // Display an error message if the query execution failed
                                echo "<div class='alert alert-danger' role='alert'>Error: " . $stmt->error . "</div>";
                            } else {
                                $rows = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
                                foreach ($rows as $row) {
                                    $servicefee= 1000;
                                    echo "<tr><td>" . $symptom . "</td><td>" . $row["drug_name"] . "</td><td>" . $row["dosage"] . "</td><td>" . $row["drug_price"] . "</td></tr>";
                                    $total_amount += $row["drug_price"];
    
                                }
                            }
                        }
                    }

                }
                echo "</tbody>";
                echo "</table>";
                echo "<p class='lead'>The service fee: <strong>" . $servicefee . "</strong></p>";
                echo "<p class='lead'>The total amount to be paid for the drugs is: <strong>" . $total_amount . "</strong></p>";


                $total_bill = $servicefee + $total_amount;
                echo "<p class='lead'>The Total Bill: <strong> MWK" . $total_bill . "</strong></p>";

                //updating total bills
                $stmt = $mysqli->prepare("UPDATE patient SET total_bills=? WHERE id=?");
                $stmt->bind_param("ss", $total_bill, $patient_id);
                $stmt->execute();
            

                if (isset($_SESSION['uname'])) {
                    $username = $_SESSION['uname'];
                    $stmt = $mysqli->prepare("SELECT * FROM doctor WHERE uname = ?");
                    $stmt->bind_param("s", $username);
                    $result = $stmt->execute();
                  
                    if ($result === false) {

                      // Display an error message if the query execution failed
                      echo "<div class='alert alert-danger' role='alert'>Error: " . $stmt->error . "</div>";

                    } else {

                      // Display the doctor's username if the query execution succeeded
                      $doctor = $stmt->get_result()->fetch_assoc();
                      $prescribed_on = date("H:i:s d-m-Y ");
                      echo "<p class='list-group-item'><b style='color: green;'>Prescribed by</b><b> " . $doctor['uname'] . "</b>&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  <b style='color: green;'>Prescribed at </b><b>".$prescribed_on." </b></p>";

                      echo "<a href='' class='btn btn-primary'>Print</a>";
                      echo"&nbsp";  echo"&nbsp";  echo"&nbsp";  echo"&nbsp"; 
                      echo"&nbsp";  echo"&nbsp";  echo"&nbsp";  echo"&nbsp"; 
                      echo "<a href='../nurse_dashboard.php' class='btn btn-primary'>Go to Dashboard</a>";
                    }
                }
                
                ?>
        </div>
      </div>
    </div>
          <!-- jQuery -->
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <!-- Bootstrap JavaScript -->
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.10.0/jspdf.umd.min.js"></script>
          <!-- <script>
          // Function to generate the PDF
          function generatePDF() {
            // Create a new jsPDF instance
            const doc = new jsPDF();

            // Get the prescription table element
            const table = document.getElementById('prescription-table');

            // Convert the table to a data URL
            doc.autoTable({ html: table });

            // Save the PDF file
            doc.save('prescription.pdf');
          }

          // Add event listener to the "Print Prescription" button
          const printButton = document.getElementById('print-button');
          printButton.addEventListener('click', generatePDF);
        </script>
                           -->
  </body>
</html>