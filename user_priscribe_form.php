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
    
    <form method="POST" action="user_prescribe.php"> 
      <?php
    if(isset($_GET['view'])){
  $id = $_GET['view'];
  $sql2 = "SELECT * FROM patient WHERE id='$id'";
  $result2 = $mysqli->query($sql2);

      $row = $result2->fetch_assoc();
      $id = $row['id'];
      $name = $row['name'];
      $age = $row['age'];
      $date = $row['gender'];     
  
} ?>
                <hr>
                        <table class="table table-hover" style="overflow:auto">
                            <thead class="table table-hover">
                                <tr>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id = "myTable">
                           
                                <tr>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['age']; ?></td> 
                                    <td><?php echo $row['gender']; ?></td> 
                                    <td class="btn-group btn-group-justified">                                       
                                         <a href="book_appointment.php?book=<?php echo $row["id"]; ?>" class="badge text-light bg-primary mx-1">Book Appointment</a>
                                        <a href="view_history.php?history=<?php echo $row["id"]; ?>" class="badge text-light bg-secondary">View History</a>
                                    </td>
                                </tr>
                          
                            </tbody>
                        </table>
                        
                        <div class="form-group">
  <input type="hidden" class="form-control" value="<?= $id; ?>" id="patient_id" name="patient_id" placeholder="Patient ID" required> 

            <label for="symptoms"><strong>Primary Diagnosis:</strong></label><br>
            <p><em><strong>Please select all physical or mental manifestations experienced by an individual that indicate the presence of a disease:</strong></em></p>
            
            <div class="row">
              <div class="col-md-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="symptoms[]" value="Fever" id="fever">
                  <label class="form-check-label" for="fever">Fever</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="symptoms[]" value="Cough" id="cough">
                  <label class="form-check-label" for="cough">Cough</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="symptoms[]" value="Shortness of breath" id="shortness-of-breath">
                  <label class="form-check-label" for="shortness-of-breath">Shortness of Breath</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="symptoms[]" value="Fatigue" id="fatigue">
                  <label class="form-check-label" for="fatigue">Fatigue</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="symptoms[]" value="Headache" id="headache">
                  <label class="form-check-label" for="headache">Headache</label>
                </div>
                <div class="form-check">
              <input class="form-check-input" type="checkbox" name="symptoms[]" value="Chest Pain" id="chest-pain">
              <label class="form-check-label" for="chest-pain">Chest Pain</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="symptoms[]" value="Dizziness" id="dizziness">
              <label class="form-check-label" for="dizziness">Dizziness</label>
            </div>
              </div>
              
              <div class="col-md-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="symptoms[]" value="Muscle aches" id="muscle-aches">
                  <label class="form-check-label" for="muscle-aches">Muscle Aches</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="symptoms[]" value="Loss of appetite" id="loss-of-smell">
                  <label class="form-check-label" for="loss-of-smell">Loss of Smell</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="symptoms[]" value="Loss of taste" id="loss-of-taste">
                  <label class="form-check-label" for="loss-of-taste">Loss of Taste</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="symptoms[]" value="Sore throat" id="sore-throat">
                  <label class="form-check-label" for="sore-throat">Sore Throat</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="symptoms[]" value="Runny nose" id="runny-nose">
                  <label class="form-check-label" for="runny-nose">Runny Nose</label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="checkbox" name="symptoms[]" value="Pink eye" id="pink-eye">
              <label class="form-check-label" for="pink-eye">Pink Eye</label>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="symptoms[]" value="Nausea" id="nausea">
              <label class="form-check-label" for="nausea">Nausea</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="symptoms[]" value="Vomiting" id="vomiting">
              <label class="form-check-label" for="vomiting">Vomiting</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="symptoms[]" value="Diarrhoea" id="diarrhea">
              <label class="form-check-label" for="diarrhea">Diarrhoea</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="symptoms[]" value="Itching" id="itching">
              <label class="form-check-label" for="itching">Itching</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="symptoms[]" value="General body aches" id="body-aches">
              <label class="form-check-label" for="body-aches">Body Aches</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="symptoms[]" value="Skin rash" id="skin-rash">
              <label class="form-check-label" for="skin-rash">Skin Rash</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="symptoms[]" value="Allergy" id="allergy">
              <label class="form-check-label" for="allergy">Allergy</label>
            </div>
          </div>

          </div>


       <div class="form-group" method="POST" >
          <label for="others"><b>Others Symptoms:</b></label>
          <textarea class="form-control" id="others" name="others" rows="1" ></textarea>
        </div>
        
        <a href="send_to_lab.php?send=<?php echo $row["id"]; ?> " class=" badge text-secondary ">Send Lab Request</a> &nbsp; &nbsp;&nbsp;&nbsp;
         <a href="View_lab_results.php?view_results=<?php echo $row["id"]; ?>" class=" badge text-secondary">View Lab Results</a>
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
