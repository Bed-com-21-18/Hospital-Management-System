<?php 
include 'user_regdb.php';
include "comfig.php";
if (isset($_SESSION['id']) && isset($_SESSION['uname'])){
?>    

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prescribe Patient</title>
  <link rel="stylesheet" href="style.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<script>
  function goBack() {
    window.history.back();
  }
  </script>
<body>

    <!-- Retrive patient name, age and gender -->
     
      <?php
  include "unavbar.php";

    if(isset($_GET['view'])){
  $id = $_GET['view'];
  $sql2 = "SELECT * FROM patient WHERE id='$id'";
  $result2 = $mysqli->query($sql2);
 
    ?>
                
                <div class="container bg-light p-2">
                        <table class="table table-hover" style="overflow:auto">
                            <thead class="table table-hover">
                                <tr>
                                    <th>Patient name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id = "myTable">
                            <?php while($row = $result2->fetch_assoc()){ ?>
                           
                                <tr>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['age']; ?></td> 
                                    <td><?php echo $row['gender']; ?></td> 
                                    <td class="btn-group btn-group-justified">                                       
                                         <a href="book_appointment.php?book=<?php echo $row["id"]; ?>" class="p-2 badge text-light bg-primary mx-1">Book Appointment</a>
                                        <a href="view_history.php?history=<?php echo $row["id"]; ?>" class="p-2 badge text-light bg-secondary">View History</a>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
<br>
            <!-- prescription form -->
    <div class="container bg-light"> 
        <form method="POST" class="p-2" action="user_prescribe.php">             
            <div class="form-group" method="POST" >
                <input type="hidden" class="form-control" value="<?= $id; ?>" id="patient_id" name="patient_id" placeholder="Patient ID" required> 
                <h4 class="text-center">Primary Diagnosis</h4>
                <p><i><b>please tick physical or mental manifestations experienced by an individual that indicate the presence of a disease</i></b></p>
                <div class="row g-4">
                    <div class="col-md-12">
                        <input type="checkbox" name="symptoms[]" value="Fever"> Fever &nbsp;
                        <input type="checkbox" name="symptoms[]" value="Cough"> Cough &nbsp;
                        <input type="checkbox" name="symptoms[]" value="Shortness of breath"> Shortness of Breath &nbsp;
                        <input type="checkbox" name="symptoms[]" value="Fatigue"> Fatigue &nbsp; 
                        <input type="checkbox" name="symptoms[]" value="Headache"> Headache &nbsp;
                        <input type="checkbox" name="symptoms[]" value="Muscle aches"> Muscle Aches &nbsp;
                        <input type="checkbox" name="symptoms[]" value="Loss of appetite"> Loss of Smell &nbsp;
                        <input type="checkbox" name="symptoms[]" value="Loss of taste"> Loss of Taste &nbsp;
                        <input type="checkbox" name="symptoms[]" value="Sore throat"> Sore Throat &nbsp; <br>
                        <input type="checkbox" name="symptoms[]" value="Runny nose"> Runny Nose &nbsp;
                        <input type="checkbox" name="symptoms[]" value="Nausea"> Nausea &nbsp;
                        <input type="checkbox" name="symptoms[]" value="Vomiting"> Vomiting &nbsp;
                        <input type="checkbox" name="symptoms[]" value="Diarrhoea"> Diarrhoea &nbsp;
                        <input type="checkbox" name="symptoms[]" value="Itching"> Itching &nbsp;
                        <input type="checkbox" name="symptoms[]" value=" General body aches"> Body Aches &nbsp;
                        <input type="checkbox" name="symptoms[]" value="Dizziness"> Dizziness &nbsp;
                        <input type="checkbox" name="symptoms[]" value="Allergy"> Allergy &nbsp;
                        <input type="checkbox" name="symptoms[]" value="Chest Pain"> Chest Pain &nbsp;
                        <input type="checkbox" name="symptoms[]" value="Pink eye"> Pink Eye &nbsp;
                        <input type="checkbox" name="symptoms[]" value="Skin-rash"> Skin Rash &nbsp;
                    </div>
                </div><br>
                <div class="form-group" method="POST" >
                  <label for="others"><b>Others:</b></label>
                  <textarea class="form-control" id="others" name="others" rows="1" ></textarea>
                </div> 
                <div class="form-group">        
                <a href="radiology_page.php?page=<?php echo $id; ?>" class="badge bg-primary text-light mx-1">Send to radiology</a>
                <a href="radiology_view.php?viewing=<?php echo $id; ?>" class="badge bg-secondary text-light mx-1">View radiology results</a>
                <?php }?>
              </div>
                <div class="form-group p-2">         
                  <button type="submit" class="btn btn-primary">Proceed</button> &nbsp;&nbsp;&nbsp;&nbsp;
              <button onclick="goBack()" class="btn btn-secondary">Go Back</button>
              </div>
            </div>
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
