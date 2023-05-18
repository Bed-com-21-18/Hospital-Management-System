<?php 
    include 'doctor_regdb.php';
    include "comfig.php";
    include "dnavbar.php";
    if (isset($_SESSION['id']) && isset($_SESSION['uname'])){
    // retrieve the symptoms and patient ID stored in session
        $symptoms = $_SESSION["symptoms"];
        $symptoms_string =  $_SESSION["symptoms_string"];
        $servicefee= 1000;
        $patient_id = $_SESSION["patient_id"];

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
          if (isset($_SESSION['uname'])) {
                //updating total bills
                $stmt = $mysqli->prepare("UPDATE patient SET history=? WHERE id=?");
                $stmt->bind_param("ss", $symptoms_string, $patient_id);
                $stmt->execute();
          }

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
          echo "<div class='row mb-3'>";
                        
               // Prepare the table for displaying the prescription
                echo "<div class='table-responsive'>";
                echo "<table class='table table-striped'>";
                echo "<thead>";
                $age = $patient["age"];
                $patient_id = $patient["id"];
                $name = $patient["name"];
                $total_amount = 0;
                $total_amount = 0;
                echo "<table class='table'>";
                echo "<p class='lead'><b>Below is the billing, dosage, and prescription summary for <b>$name</b>, who is <strong>$age years old.</strong></b></p>";
                echo "<thead><tr><th>Drug Name</th><th>Drug Price</th></tr></thead>";
                echo "<tbody>";
                
                // Fetch the drug and dosage from the patient table using patient_id
                $stmt = $mysqli->prepare("SELECT drug, dosage FROM patient WHERE id = ?");
                $stmt->bind_param("i", $patient_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $patientData = $result->fetch_assoc();
                $drugs = explode(", ", $patientData['drug']);
                $dosage = $patientData['dosage'];
                // Fetch the matching drugs based on drug name from the drug table
                foreach ($drugs as $drug) {
                    $drugNamePattern = "%$drug%";
                    $stmt = $mysqli->prepare("SELECT drug_name, drug_price2 FROM drug WHERE drug_name LIKE ?");
                    $stmt->bind_param("s", $drugNamePattern);
                    $stmt->execute();
                    $result = $stmt->get_result();
                
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $row["drug_name"] . "</td><td>" . $row["drug_price2"] . "</td></tr>";
                            $total_amount += $row["drug_price2"];
                        }
                    }
                }
                $total_bill = $total_amount + $servicefee;
                echo "</tbody>";
                echo "</table>";
                echo "<p class='lead'>Dosage : <strong>" . $dosage . "</strong></p>";
                echo "<p class='lead'>The service fee: <strong> MWK" . $servicefee . "</strong></p>";
                echo "<p class='lead'>Total Bill: MWK" . $total_bill . "</p>";
                
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

                      echo "<a href='download_pdf.php' class='btn btn-primary'>Print</a>";
                      echo"&nbsp";  echo"&nbsp";  echo"&nbsp";  echo"&nbsp"; 
                      echo"&nbsp";  echo"&nbsp";  echo"&nbsp";  echo"&nbsp"; 
                      echo "<a href='doc_dashboard.php' class='btn btn-primary'>Go to Dashboard</a>";
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
<?php 
    }else {
        header("Location: home.php");
        exit();
    }
?> 