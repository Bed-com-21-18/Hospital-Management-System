<?php 
    include 'doctor_regdb.php';
    include "comfig.php";
    include "dnavbar.php";
    if (isset($_SESSION['id']) && isset($_SESSION['uname'])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prescribe Patient</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<script>
  function send() {
    <div class="form-group" action="user_prescribe.php" method="POST">
    <textarea class="form-control" id="lab" name="lab" rows="1" ></textarea>
          <button type="submit" class="btn btn-primary">Send</button>
          </div>
  }
  </script>
<body>
   
            <div class="container">
                <h3 class="text-center bg-light text-secondary">Prescription</h3>
            </div>
    
  <!-- prescription form -->
  <div class="container bg-light">
    
    <form method="POST" action="prescribe.php"> 
      <?php
    if(isset($_GET['viewing'])){
  $id = $_GET['viewing'];
  
  $sql2 = "SELECT * FROM patient WHERE id='$id'";
  $result2 = $mysqli->query($sql2);

      $row = $result2->fetch_assoc();
      $id = $row['id'];
      $name = $row['name'];
      $age = $row['age'];
      $date = $row['date']; 
      $gender = $row['gender'];     
  
} ?>
                <hr>
                        <table class="table table-hover" style="overflow:auto">
                            <thead class="table table-hover">
                                <tr>
                                    <th>Name</th>
                                    <th>Date of Birth</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id = "myTable">
                           
                                <tr>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $date; ?></td> 
                                    <td><?php echo $age; ?></td> 
                                    <td><?php echo $gender; ?></td> 
                                    <td class="btn-group btn-group-justified">                                       
                                         <a href="doc_book_appointment.php?doc_book=<?php echo $row["id"]; ?>" class="badge text-light bg-primary mx-1">Book Appointment</a>
                                        <a href="doc_view_history.php?doc_history=<?php echo $row["id"]; ?>" class="badge text-light bg-secondary">View History</a>
                                    </td>
                                </tr>
                          
                            </tbody>
                        </table>
                        
        <div class="form-group" method="POST" >
        <input type="hidden" class="form-control" value="<?= $id; ?>" id="patient_id" name="patient_id" placeholder="Patient ID" required> 
 
          <label for="symptoms"><b>Primary Diagnosis:</b></label><br>
          <p><i><b>please tick physical or mental manifestations experienced by an individual that indicate the presence of a disease</i></b></p>
          <input type="checkbox" name="symptoms[]" value="Fever"> Fever &nbsp;
          <input type="checkbox" name="symptoms[]" value="Cough"> Cough &nbsp;
          <input type="checkbox" name="symptoms[]" value="Shortness of breath"> Shortness of Breath &nbsp;
          <input type="checkbox" name="symptoms[]" value="Fatigue"> Fatigue &nbsp; 
          <input type="checkbox" name="symptoms[]" value="Headache"> Headache &nbsp;
          <br>
          <input type="checkbox" name="symptoms[]" value="Muscle aches"> Muscle Aches &nbsp;
          <input type="checkbox" name="symptoms[]" value="Loss of appetite"> Loss of Smell &nbsp;
          <input type="checkbox" name="symptoms[]" value="Loss of taste"> Loss of Taste &nbsp;
          <input type="checkbox" name="symptoms[]" value="Sore throat"> Sore Throat &nbsp;
          <input type="checkbox" name="symptoms[]" value="Runny nose"> Runny Nose &nbsp;
          <br>
          <input type="checkbox" name="symptoms[]" value="Nausea"> Nausea &nbsp;
          <input type="checkbox" name="symptoms[]" value="Vomiting"> Vomiting &nbsp;
          <input type="checkbox" name="symptoms[]" value="Diarrhoea"> Diarrhoea &nbsp;
          <input type="checkbox" name="symptoms[]" value="Itching"> Itching &nbsp;
          <input type="checkbox" name="symptoms[]" value=" General body aches"> Body Aches &nbsp;
          <br>
          <input type="checkbox" name="symptoms[]" value="Dizziness"> Dizziness &nbsp;
          <input type="checkbox" name="symptoms[]" value="Allergy"> Allergy &nbsp;
          <input type="checkbox" name="symptoms[]" value="Chest Pain"> Chest Pain &nbsp;
          <input type="checkbox" name="symptoms[]" value="Pink eye"> Pink Eye &nbsp;
          <input type="checkbox" name="symptoms[]" value="Skin-rash"> Skin Rash &nbsp;
      </div>
        <div class="form-group" method="POST" >
          <label for="others"><b>Others Symptoms:</b></label>
          <textarea class="form-control" id="others" name="others" rows="1" ></textarea>
        </div>
        
        <a href="doc_send_to_lab.php?doc_send=<?php echo $row["id"]; ?> " class=" badge text-secondary ">Send Lab Request</a> &nbsp; &nbsp;&nbsp;&nbsp;
         <a href="doc_view_lab_results.php?doc_view_results=<?php echo $row["id"]; ?>" class=" badge text-secondary">View Lab Results</a>
        <br>  <br>
        <button type="submit" class="btn btn-primary">Proceed</button> &nbsp;&nbsp;&nbsp;&nbsp;
        <button class='btn btn-secondary' onclick='window.history.back()'> Go Back</button>
    </form>
  </div>
  
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
<?php 
    }else {
        header("Location: home.php");
        exit();
    }
?> 