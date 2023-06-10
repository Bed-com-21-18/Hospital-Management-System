<?php 
    include 'user_regdb.php';
    include "comfig.php";
    include "unavbar.php";
    if (isset($_SESSION['id']) && isset($_SESSION['uname'])){
    if (isset($_GET['patient_id'])) {
        $id = $_GET['patient_id'];
        $sql2 = "SELECT * FROM patient WHERE id='$id'";
        $result2 = $mysqli->query($sql2);

        $row = $result2->fetch_assoc();
        $id = $row['id'];
        $name = $row['name'];
        $age = $row['age'];
        $date = $row['gender'];
    }

        
        $patient_id = $id ;

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
  <style>
    .container {
        padding: 15px;
        border: 1px solid black;
        box-sizing: border-box;

    }
</style>

  <body>
    <div class="container mt-5">
      <div class="row">
        <div class="col-sm-12">
          <?php
          if (isset($_SESSION['uname'])) {
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
                      $lab_bill = $patient['lab_price'];
                      $tests = $patient['tests']; 
                      $rad_bill = $patient['rad_price']; 
                      echo "<h1 class='mb-4'>Prescription, Dosage and Billing Summary</h1>";
                      ?>
                        <table class="table table-hover" style="overflow:auto">
                            <thead class="table table-hover">
                                <tr>
                                <?php if (isset($_GET['error'])) {?>
                           <p class="error"><?php echo $_GET['error']; ?></p>
                           <?php } ?>
                           
                       <?php if (isset($_GET['success'])) {?>
                           <p class="success"><?php echo $_GET['success']; ?></p>
                           <?php } ?>
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
                echo "<table class='table'>";
                echo "<thead><tr><th>Drug Name</th><th>Price (MWK)</th></tr></thead>";
                echo "<tbody>";
                
                // Fetch the drug and dosage from the patient table using patient_id
                $stmt = $mysqli->prepare("SELECT drug, dosage FROM patient WHERE id = ?");
                $stmt->bind_param("i", $patient_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $patientData = $result->fetch_assoc();
                $drugs = explode(",", $patientData['drug']);
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
                $servicefee =1000;
                $total_bill = $total_amount + $servicefee + $rad_bill +$lab_bill;
                echo "</tbody>";
                echo "</table>";
                echo "<div>";
                 echo "<p class='lead'><b>Dosage :</b> <strong>" . $dosage . "</strong></p>";
                 echo "</div>";
                if ($lab_bill > 0) {
                  echo "<p class='lead'>The bill for laboratory test: <b>$tests</b> <strong> MWK" . $lab_bill . "</strong></p>";
              }
              
              if ($rad_bill > 0) {
                  echo "<p class='lead'>The bill for Radiology test: <strong> MWK" . $rad_bill . "</strong></p>";
              }
              
              echo "<p class='lead'>The bill for drugs fee: <strong> MWK" . $total_amount . "</strong></p>";
              echo "<p class='lead'>The service fee: <strong> MWK" . $servicefee . "</strong></p>";
              echo "<p class='lead'>Total Bill:  <strong>MWK" . $total_bill . " <strong></p>";
              
                

            

                if (isset($_SESSION['uname'])) {
                    $username = $_SESSION['uname'];
                    $stmt = $mysqli->prepare("SELECT * FROM user WHERE uname = ?");
                    $stmt->bind_param("s", $username);
                    $result = $stmt->execute();
                  
                    if ($result === false) {

                      // Display an error message if the query execution failed
                      echo "<div class='alert alert-danger' role='alert'>Error: " . $stmt->error . "</div>";

                    } else {

                      // Display the user's username if the query execution succeeded
                      $user = $stmt->get_result()->fetch_assoc();
                      $prescribed_on = date("H:i:s d-m-Y ");
                      echo "<p class='list-group-item'><b style='color: green;'>Prescribed by</b><b> " . $user['uname'] . "   </b>&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  <b style='color: green;'>Prescribed at </b><b>".$prescribed_on." </b></p>";
                      echo "<a href='download_pdf.php?download=" . $id . "' class='btn btn-primary'>Print</a>";
                      echo"&nbsp";  echo"&nbsp";  echo"&nbsp";  echo"&nbsp"; 
                      echo"&nbsp";  echo"&nbsp";  echo"&nbsp";  echo"&nbsp"; 
                      echo "<a href='nurse_dashboard.php' class='btn btn-primary'>Go to Dashboard</a>";
                                      //updating total bills
                      $stmt = $mysqli->prepare("UPDATE patient SET prescribed_by=?, prescribed_on=?, total_bills=? WHERE id=?");
                      $stmt->bind_param("ssss", $username, $prescribed_on, $total_bill, $patient_id);
                      $stmt->execute();
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
<?php 
    }else {
        header("Location: home.php");
        exit();
    }
?> 