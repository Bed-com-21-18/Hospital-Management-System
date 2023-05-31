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
   
            <div class="P-2">
                <h4 class="text-center bg-light text-secondary p-2">HISTORY TAKING</h4>
            </div>

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
                <div class="container">
                        <table class="table table-hover" style="overflow:auto">
                            <thead class="table table-hover">
                                <tr>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Sex</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id = "myTable">
                           
                                <tr>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['age']; ?></td> 
                                    <td><?php echo $row['gender']; ?></td> 
                                    <td class="btn-group btn-group-justified">                                       
                                         <!-- <a href="book_appointment.php?book=" class="badge text-light bg-primary mx-1">Book Appointment</a> -->
                                        <a href="view_history.php?history=<?php echo $row["id"]; ?>" class="badge text-light bg-secondary">Previous History</a>
                                    </td>
                                </tr>
                          
                            </tbody>
                        </table>
                  </div> 

    
      <form method="POST" action="user_prescribe.php"> 
          
         <input type="hidden" class="form-control" value="<?= $id; ?>" id="patient_id" name="patient_id" placeholder="Patient ID" required> 
         <div class="container py-2"> 
         <div class="card p-1">
            <div class="row px-4"> 
              <h5 class="text-center">Signs and symptoms</h5> 
                
              <div class="col-md-6">
                  <div class="form-group">
                    <select name="symptoms[]" class="form-select">
                        <option value="" class="text-center">Select signs & symptoms</option>
                        <option value="Fever">Fever</option>
                        <option value="Cough">Cough</option> 
                        <option value="Shortness of breath">Shortness of breath</option> 
                        <option value="Fatigue">Fatigue</option> 
                        <option value="Headache">Headache</option> 
                        <option value="Chest Pain">Chest Pain</option> 
                        <option value="Dizziness">Dizziness</option>
                        <option value="Muscle aches">Muscle aches</option>
                        <option value="Loss of appetite">Loss of appetite</option>
                        <option value="Loss of taste">Loss of taste</option>
                        <option value="Sore throat">Sore throat</option>
                        <option value="Runny nose">Runny nose</option>
                        <option value="Loss of appetite">Nausea</option>
                        <option value="Vomiting">Vomiting</option>
                        <option value="Passing out losss stools">Passing out losss stools</option>
                        <option value="Itching">Itching</option>
                        <option value="General body aches">General body aches</option>
                        <option value="Skin rash">Skin rash</option>
                        <option value="Vomiting">Vomiting</option>
                        <option value="Vomiting">Vomiting</option>
                    </select>
                </div>
                </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" name="duration" placeholder="Enter duration of sign & symptom">
                    </div>
                  </div> 
              </div>
            </div>  
          </div>
     
          <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card p-1">
                    <form action="" class="" method="post">
                       <div class="row">
                       <h5 class="text-center">Vital sign</h5>
                          <div class="col-md-3">
                            <div class="form-group mb-1 text-center">
                                <label><b>General Examination</b></label>
                                <select name="vital_sign" class="form-select">
                                    <option value="">Select general examination</option>
                                    <option value="pale">Pale conjuctives</option>
                                    <option value="unconscious">Unconscious</option> 
                                    <option value="alert">Alert</option> 
                                </select>
                            </div>
                          </div>
                           <div class="col-md-3">
                            <div class="form-group mb-1 text-center">
                                <label><b>Tempereture</b></label>
                                <input type ="text" name="" class="form-control" placeholder="enter temperature">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group mb-1 text-center">
                                <label><b>Pulse rate</b></label>
                                <input type ="text" name="" class="form-control" placeholder="enter pulse rate">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group mb-1 text-center">
                                <label><b>Respiratory rate</b></label>
                                <input type ="text" name="" class="form-control" placeholder="enter respiratory rate">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group mb-1 text-center">
                                <label><b>Blood pressure</b></label>
                                <input type ="text" name="" class="form-control" placeholder="enter blood pressure">
                            </div>
                          </div>
                     </form>
                    </div>
                </div>
            </div>

          
         <div class="container">
         <div class="card p-1">
            <div class="row text-center">
              <div class="col-md-3">
                  <div class="">
                      <label><b>History of complaints</b></label>
                      <textarea class="p-3" name="history" placeholder="Patients Description of what happened"></textarea>
                  </div> 
              </div>
              <div class="col-md-3">
                  <div class="">
                      <label><b>Drug history</b></label>
                      <textarea class="p-3" name="history" placeholder="Over the counter drug"></textarea>
                  </div> 
              </div>
              <div class="col-md-3">
                  <div class="">
                      <label><b>Medical/Surgical history</b></label>
                      <textarea class="p-3" name="history" placeholder="Chronic problem"></textarea>
                  </div> 
              </div>
              <div class="col-md-3">
                  <div class="">
                      <label><b>Social history</b></label>
                      <textarea class="p-3" name="history" placeholder="What a petient does socially"></textarea>
                  </div> 
              </div>
              <div class="col-md-3">
                  <div class="">
                      <label><b>Family history</b></label>
                      <textarea class="p-3" name="history" placeholder="petient's family history"></textarea>
                  </div> 
              </div>
              <div class="col-md-3">
                  <div class="">
                      <label><b>Review of other system</b></label>
                      <textarea class="p-3" name="history" placeholder="Checking possible systems"></textarea>
                  </div> 
              </div>
              <div class="col-md-3">
                  <div class="">
                      <label><b>Physical examination</b></label>
                      <textarea class="p-3" name="history" placeholder="Physical examination"></textarea>
                  </div> 
              </div>
            </div>
         </div>
         </div>
        
<div class="form-group py-2 text-center">
        <a type="submit" href="user_prescribe.php?diagnose=<?php echo $row["id"]; ?> " class="btn btn-primary">Diagnose</a>
        <a class="btn btn-secondary" href="patient_list_user.php">Cancel</a>
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
