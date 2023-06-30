<?php 
    include 'user_regdb.php';
    if (isset($_SESSION['id']) && isset($_SESSION['uname'])){
    include "unavbar.php";
    include 'comfig.php'; 
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset= "UTF-8">
<meta name="author" content="Matilda">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Hospital Management System</title>
<link rel= "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

<!-- <link rel="stylesheet" href="home.css"/> -->
</head>

<body>

<div class="container p-4">
    <?php
    if(isset($_GET['view'])){
        $id = $_GET['view'];
        $sql = "SELECT * FROM antenatal WHERE id='$id'";
        $sults = $mysqli ->query($sql);
        $row =$sults->fetch_assoc();
        
        $full_name = $row['full_name'];
        $age = $row['age'];
        $gender = $row['gender'];


    }
    ?>

<div class="container">
            <table class="table table-hover" style="overflow:auto">
                <thead class="table table-hover">
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Sex</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody id="myTable">
                    <tr>
                        <td><?php echo $row['full_name']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <!-- <td class="btn-group btn-group-justified">
                            <a href="view_history.php?history=<?php echo $row["id"]; ?>" class="badge text-light bg-secondary">Previous History</a>
                        </td> -->
                    </tr>
                </tbody>
            </table>
        </div>


        <form method="POST" action="antenatal_results.php">
            <input type="hidden" class="form-control" value="<?= $id; ?>" id="patient_id" name="patient_id" placeholder="Patient ID" required>
            <div class="container py-2">
                <div class="card ">
                    <div class="row px-4">
                        <h5 class="text-center">Obstetric history</h5>
                        <div class="form-group">  
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Deliveries</label>
                                       <div class="col-md-6 drop-down">
                                       <select name="delivery" class="form-select form-select-sm mb-3" aria-label=".form-select-lg example">
                                           <option selected>Select number of deliveries</option>
                                           <option value="deliveries">One</option>
                                           <option value="delivery1">Two</option>
                                           <option value="delivery2">Three</option>
                                           <option value="delivery3">Four</option>
                                           <option value="delivery4">Five+</option>
                                    </select> 
                                        </div>  
                                </div>
                                <div class="row mb-3">  
                                    <label class="col-sm-3 col-form-label">C-Section</label>
                                       <div class="col-md-6 drop-down">
                                       <select name="c_section[]" class="form-select form-select-sm mb-3" aria-label=".form-select-lg example">
                                                 <option selected>Done C-section before?</option>
                                                 <option value="c1">Yes</option>
                                                 <option value="c2">No</option>
                                        </select>
                                        </div>  
                                </div>
                                
                                <div class="row mb-3">  
                                    <label class="col-sm-3 col-form-label">Abortions</label>
                                    <div class="col-md-6 drop-down">
                                    <select name="abortions[]" class="form-select form-select-sm mb-3" aria-label=".form-select-lg example">
                                           <option selected>Select number of Abortions </option>
                                           <option value="abortion">none</option>
                                           <option value="abortion1">One</option>
                                           <option value="abortion2">Two</option>
                                           <option value="abortion3">Three+</option>
                                    </select> 
                                </div>
                                </div>
                                <div class="row mb-3">  
                                    <label class="col-sm-3 col-form-label">Stillbirths</label>
                                       <div class="col-md-6 drop-down">
                                       <select name="stillbirth[]" class="form-select form-select-sm mb-3" aria-label=".form-select-lg example">
                                           <option selected>Had Stillbirths before?</option>
                                           <option value="birth1">Yes</option>
                                           <option value="birth2">No</option>
                                    </select> 
                                        </div>  
                                </div>
                                <div class="row mb-3">  
                                    <label class="col-sm-3 col-form-label">Vacuum ex.</label>
                                       <div class="col-md-6 drop-down">
                                       <select name="vacuum[]" class="form-select form-select-sm mb-3" aria-label=".form-select-lg example">
                                           <option selected>Had Vacuum extraction before?</option>
                                           <option value="vacuum1">Yes</option>
                                           <option value="vacuum2">No</option>
                                    </select> 
                                        </div>  
                                </div>
                                <div class="row mb-3">  
                                    <label class="col-sm-3 col-form-label">(Pre)Eclampsia</label>
                                       <div class="col-md-6 drop-down">
                                       <select name="eclampsia[]" class="form-select form-select-sm mb-3" aria-label=".form-select-lg example">
                                           <option selected> select </option>
                                           <option value="pre1">Yes</option>
                                           <option value="pre2">No</option>
                                    </select> 
                                        </div>  
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group" id="obstetricContainer">
                                <!-- Duration text areas will be dynamically generated here -->
                            </div>
                        </div>
                    </div>

                    <div class="card">
                    <div class="row px-4">
                            <h5 class="text-center">Medical History</h5>
                            <div class="form-group">
                            <div class="row mb-3">  
                                    <label class="col-sm-3 col-form-label">Asthma</label>
                                       <div class="col-md-6 drop-down">
                                       <select class="form-select form-select-sm mb-3" aria-label=".form-select-lg example">
                                           <option selected> select </option>
                                           <option value="astma1">Yes</option>
                                           <option value="asthma2">No</option>
                                    </select> 
                                        </div>  
                                </div>
                                <div class="row mb-3">  
                                    <label class="col-sm-3 col-form-label">Hypertension</label>
                                       <div class="col-md-6 drop-down">
                                       <select class="form-select form-select-sm mb-3" aria-label=".form-select-lg example">
                                           <option selected> select </option>
                                           <option value="hyper1">Yes</option>
                                           <option value="hyper2">No</option>
                                    </select> 
                                        </div>  
                                </div>

                                <div class="row mb-3">  
                                    <label class="col-sm-3 col-form-label">Diabetes</label>
                                       <div class="col-md-6 drop-down">
                                       <select class="form-select form-select-sm mb-3" aria-label=".form-select-lg example">
                                           <option selected> select </option>
                                           <option value="diabete1">Yes</option>
                                           <option value="diabete2">No</option>
                                    </select> 
                                        </div>  
                                </div>

                                <div class="row mb-3">  
                                    <label class="col-sm-3 col-form-label">Epilepsy</label>
                                       <div class="col-md-6 drop-down">
                                       <select class="form-select form-select-sm mb-3" aria-label=".form-select-lg example">
                                           <option selected> select </option>
                                           <option value="epilepsy1">Yes</option>
                                           <option value="epilepsy2">No</option>
                                    </select> 
                                        </div>  
                                </div>

                                <div class="row mb-3">  
                                    <label class="col-sm-3 col-form-label">Renal disease</label>
                                       <div class="col-md-6 drop-down">
                                       <select class="form-select form-select-sm mb-3" aria-label=".form-select-lg example">
                                           <option selected> select </option>
                                           <option value="renal1">Yes</option>
                                           <option value="renal2">No</option>
                                    </select> 
                                        </div>  
                                </div>

                                <div class="row mb-3">  
                                    <label class="col-sm-3 col-form-label">Fistual repair</label>
                                       <div class="col-md-6 drop-down">
                                       <select class="form-select form-select-sm mb-3" aria-label=".form-select-lg example">
                                           <option selected> select </option>
                                           <option value="fistula1">Yes</option>
                                           <option value="fistula2">No</option>
                                    </select> 
                                        </div>  
                                </div>

                                <div class="row mb-3">  
                                    <label class="col-sm-3 col-form-label">Leg/Spine deform.</label>
                                       <div class="col-md-6 drop-down">
                                       <select class="form-select form-select-sm mb-3" aria-label=".form-select-lg example">
                                           <option selected> select </option>
                                           <option value="leg1">Yes</option>
                                           <option value="leg2">No</option>
                                    </select> 
                                        </div>  
                                </div>
                                <div class="row mb-3">  
                                    <label class="col-sm-3 col-form-label">Age</label>
                                       <div class="col-md-6 drop-down">
                                       <select class="form-select form-select-sm mb-3" aria-label=".form-select-lg example">
                                           <option selected> select </option>
                                           <option value="number">16-39</option>
                                           <option value="number1"> less than 16</option>
                                           <option value="number2"> more than 40</option>

                                    </select> 
                                        </div>  
                                </div>
                            </div>
                    
                            <div class="col-md-6">
                                <div class="form-group" id="medicalContainer">
                                    <!-- Patient history text areas will be dynamically generated here -->
                                </div>
                            </div>
                        </div>
</div>
                        <div class="card ">
                            <div class="row px-4">
                                <h5 class="text-center">Examination</h5>
                                <div class="form-group">

                                <div class="row mb-3">  
                                    <label class="col-sm-3 col-form-label">Weight</label>
                                       <div class="col-md-6">
                                       <input type="varchar" name="weight[]" class="form-select form-select-sm mb-3" placeholder="enter weight"></input>
                                          
                                        </div>  
                                </div>

                                <div class="row mb-3">  
                                    <label class="col-sm-3 col-form-label">Blood pressure</label>
                                       <div class="col-md-6 ">
                                       <input type="varchar" name="bloodpressure" class="form-select form-select-sm mb-3" placeholder="enter BP"></input>
                                        </div>  
                                </div>

                                <div class="row mb-3">  
                                    <label class="col-sm-3 col-form-label">Fetal heart</label>
                                       <div class="col-md-6">
                                       <input class="form-select form-select-sm mb-3" name="fetal" aria-label=".form-select-lg example"></input>
                                           
                                        </div>  
                                </div>

                                <div class="row mb-3">  
                                    <label class="col-sm-3 col-form-label">Gestation age</label>
                                       <div class="col-md-6">
                                       <input class="form-select form-select-sm mb-3" name="gestation" placeholder="Enter Gestation age" ></input>
                                           
                                        </div>  
                                </div>

                                <div class="col-md-6">
                                <div class="form-group" id="examContainer">
                                    <!-- Measurement text areas will be dynamically generated here -->
                                </div>
                            </div>
                            </div>

                                <h5 class="text-center">Lab</h5>
                                <div class="row px-4">
                                <div class="col-md-6 ">
                                <select name="lab" class="form-select " required multiple>
                                        <option value="syphihlis">Sypilis</option>
                                        <option value="hb1">Hb1</option>
                                        <option value="hb2">Hb2</option>
                                        <option value="cd4">CD4</option>
                                        <option value="hiv">HIV staus</option>

                                    </select>
                                </div>
                                </div>
                                   
                                <div class="text-center p-3">
                    <div class="dropdown d-inline-block ">
                       <button class="btn btn-primary dropdown-toggle " type="button" id="sendRequestDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         Send Test Request
                      </button>
                  <div class="dropdown-menu" aria-labelledby="sendRequestDropdown">
                  <a class="dropdown-item" href="doc_send_to_lab.php?doc_send=<?php echo $id; ?>">Lab Request</a>
                  <a class="dropdown-item" href="doc_radiology_page.php?doc_page=<?php echo $id; ?>">Radiology Request</a>
                  <a class="dropdown-item" href="doc_hiv_test_request.php?doc_hiv_test=<?php echo $id; ?>">HIV Test</a>
                  </div>
                   </div>
                   </div>
                   </div>

                            <!-- <div class="col-md-6">
                                <div class="form-group" id="examContainer">
                                    Measurement text areas will be dynamically generated here
                                </div>
                            </div> -->

                            </div>

                    <div class="card ">
                        <div class="row px-4">
                            <h5 class="text-center">TTV status</h5>
                            <div class="col-md-6">
                                <div class="form-group">
                                <table class="table">
                                 <thead>
                                       <tr>
                                       <th scope="col">TTV</th>
                                       <th scope="col">Date</th>
                                       <th scope="col">Status</th>
                                       </tr>
                                       </thead>
 
                                 <tbody>
                                   <tr>
                                   <td>TTV1</td>
                                   <td ></td>
                                   <td name="ttv1"></td>
                                   </tr>

                                   <tr>
                                   <td>TTV2</td>
                                   <td></td>
                                   <td name="ttv2"></td>
                                  </tr>

                                  <tr>
                                   <td>TTV3 </td>
                                   <td></td>
                                   <td name="ttv3"></td>
                                   </tr>

                                 <td>TTV4 </td>
                                 <td></td>
                                 <td name="ttv4"></td>
                                 </tr>
    
                                 <td>TTV5 </td>
                                 <td></td>
                                 <td name="ttv5"></td>
                                 </tr>
                                </tbody>

                               </table>
                                </div>
                            </div>

                            <div class="text-center">
                              <a href="update_ttv.php" class="btn btn-primary"> Update</button></a>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group" id="ttvContainer">
                                     Measurement text areas will be dynamically generated here
                                </div>
                            </div> -->
                        
                        </div>
                        <div class="col-auto">
                          <label  for="autoSizingInput">Planned delivery place</label>
                            <input type="text" name="delivery_place[]" class="form-control" id="autoSizingInput" placeholder="Delivery place">
                      </div>
                    <div class="col-auto">
                          <label for="autoSizingInput">Mode of transport</label>
                          <input type="text" name="transportation[]" class="form-control" id="autoSizingInput" placeholder="mode of transport">
                          </div>

                        <div class="form-group py-2 text-center">
                            <button type="submit" class="btn btn-primary" name="results">Results</button>
                            <a class="btn btn-secondary" href="antenatal_display.php">Cancel</a>

                        </div>
</div> 
                </div>
            </div>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('select[name="symptoms[]"]').change(function() {
                var selectedSymptoms = $(this).val();
                var durationContainer = $('#durationContainer');
                durationContainer.empty();

                if (selectedSymptoms.length > 0) {
                    selectedSymptoms.forEach(function(symptom) {
                        var durationInput = '<input type="text" class="form-control" name="duration[]" placeholder="Enter duration of ' + symptom + '"><br>';
                        durationContainer.append(durationInput);
                    });
                }
            });

            $('select[name="patient_history[]"]').change(function() {
                var selectedPatientHistory = $(this).val();
                var patientHistoryContainer = $('#patient_historyContainer');
                patientHistoryContainer.empty();

                if (selectedPatientHistory.length > 0) {
                    selectedPatientHistory.forEach(function(patientHistory) {
                        var patientHistoryInput = '<input type="text" class="form-control" name="patient_historyContainer[]" placeholder="Enter ' + patientHistory + '"><br>';
                        patientHistoryContainer.append(patientHistoryInput);
                    });
                }
            });

            $('select[name="measurement[]"]').change(function() {
                var selectedMeasurement = $(this).val();
                var measurementContainer = $('#measurementContainer');
                measurementContainer.empty();

                if (selectedMeasurement.length > 0) {
                    selectedMeasurement.forEach(function(measurement) {
                        var measurementInput = '<input type="text" class="form-control" name="measurementContainer[]" placeholder="Enter ' + measurement + '"><br>';
                        measurementContainer.append(measurementInput);
                    });
                }
            });

            
        $('select[name="examination[]"]').change(function() {
                    var selectedSymptoms = $(this).val();
                    var diseaseContainer = $('#notesContainer');
                    diseaseContainer.empty();

                    if (selectedSymptoms.length > 0) {
                    selectedSymptoms.forEach(function(examination) {
                        var symptomText = '<span>' + examination + '</span><br>';
                        diseaseContainer.append(symptomText);
                    });
                    }
                });
        });

   
    </script>

</body>
</html>

<?php 
    } else{
        header('Location: home.php');
        exit();
    }