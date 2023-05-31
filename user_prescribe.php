<?php 

    include 'user_regdb.php';
    include "comfig.php";
    include "unavbar.php";
    if (isset($_SESSION['id']) && isset($_SESSION['uname'])){
      

?>
        <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Diagnosis</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

<?php

if(isset($_GET['diagnose'])){
  $id = $_GET['diagnose'];
  $sql2 = "SELECT * FROM patient WHERE id='$id'";
  $result2 = $mysqli->query($sql2);

      $row = $result2->fetch_assoc();
      $id = $row['id'];
      $name = $row['name'];
      $age = $row['age'];
      $date = $row['gender'];     
  
} ?>

<h1 class='mb-4 text-center bg-light p-2'>Diagnosis</h1>
           
                <div class="container">
                        <table class="table table-hover" style="overflow:auto">
                            <thead class="table table-hover">
                                <tr>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Sex</th>
                                </tr>
                            </thead>
                            <tbody id = "myTable">
                           
                                <tr>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['age']; ?></td> 
                                    <td><?php echo $row['gender']; ?></td> 
                                </tr>
                          
                            </tbody>
                        </table>
                  </div> 

  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card p-2">
                <form action="" class="" method="post">
                   <div class="row">
                      <div class="col-md-3">
                        <div class="form-group mb-1 text-center">
                            <label><b>Respiratory</b></label>
                            <select name="diagnosis" class="form-select">
                                <option value="">Select Respiratory diseases</option>
                                <option value="Pneumia">Pneumia</option>
                                <option value="Tuberculosis">Tuberculosis</option> 
                                <option value="Acute respiratory infection">Acute respiratory infection</option>
                                <option value="Upper respiratory tract infection">Upper respiratory tract infection</option>
                                <option value="Covid 19">Covid 19</option> 
                            </select>
                        </div>
                      </div>
                       <div class="col-md-3">
                        <div class="form-group mb-1 text-center">
                            <label><b>Cardiovascular</b></label>
                            <select name="diagnosis" class="form-select">
                                <option value="">Select Cardiovascular diseases</option>
                                <option value="Hypertension">Hypertension</option>
                                <option value="Rheumatic heart disease">Rheumatic heart disease</option> 
                                <option value="Rheumatic heart fever">Rheumatic heart fever</option>
                                <option value="Vascular heart fever">Vascular heart fever</option>
                                <option value="Heart attack">Heart attack</option> 
                            </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group mb-1 text-center">
                            <label><b>Gastro intestinal</b></label>
                            <select name="v" class="form-select">
                                <option value="">Select Gastro intestine diseases</option>
                                <option value="Gastritis">Gastritis</option>
                                <option value="Pectic ulcer disease">Pectic ulcer disease</option> 
                                <option value="Gastrol oesophagal reflus disease">Gastrol oesophagal reflus disease</option>
                                <option value="Abnaminal mass">Abnaminal mass</option>
                                <option value="Appendix mass">Appendix mass</option> 
                                <option value="Tuber ovlian mass">Tuber ovlian mass</option> 
                            </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group mb-1 text-center">
                            <label><b>Extrimites</b></label>
                            <select name="diagnosis" class="form-select">
                                <option value="">Select Extrimites diseases</option>
                                <option value="Fractures">Fractures</option>
                                <option value="Masses">Masses</option> 
                                <option value="Cancers">Cancers</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group mb-1 text-center">
                            <label><b>Differential diagnosis</b></label>
                            <select name="diagnosis" class="form-select">
                                <option value="">Select optional diseases</option>
                                <option value="TB">TB</option>
                                <option value="Pleural">Pleural</option> 
                            </select>
                        </div>
                      </div>
                      </div> 
                 </form>
                </div>
            </div>
        </div>
       </div>
    
    <div class="container py-1">
      <div class="card p-1">
        <h4 class="text-center p-2">Dignosis Work up</4>
        <div class="row py-2">
            <div class="col-md-12">
                <a href="send_to_lab.php?send=<?php echo $row["id"]; ?> " class=" badge btn-primary ">Lab Request</a> 
                <a href="View_lab_results.php?view_results=<?php echo $row["id"]; ?>" class=" badge btn-secondary">Lab Results</a> 
                <a href="radiology_page.php?page=<?php echo $row["id"]; ?> " class=" badge btn-primary ">Radiology request</a> 
                <a href="radiology_view.php?viewing=<?php echo $row["id"]; ?>" class=" badge btn-secondary">Radiology Results</a> 
                <a href="hiv_test_request.php?hiv_test=<?php echo $row["id"]; ?> " class=" badge btn-primary ">HIV test</a> 
                <a href="hiv_test_results.php?hiv_results=<?php echo $row["id"]; ?>" class=" badge btn-secondary">HIV Results</a>
            </div> 
          </div>
      </div>
      </div>
      <div class="container py-2">
        <div class="card p-1">
        <h4 class="text-center p-2">Patient Management</4>
          <div class="row py-4">
            <div class="col-md-4">
                <a class="btn btn-primary" href="">Treatment plan</a>
            </div>
            <div class="col-md-4">
                <a class="btn btn-primary" href="">Counselling</a>
            </div>
            <div class="col-md-4">
              <a href="inpatient_form.php?view=<?php echo $row["id"]; ?> " class=" badge btn-primary ">Admit Patient</a>
            </div>
          </div>
        </div>
      
    </div>
    
    

  <!-- Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<?php 
    }else {
        header("Location: home.php");
        exit();
    }
?> 
