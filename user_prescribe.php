<?php
include 'user_regdb.php';
if (isset($_SESSION['id']) && isset($_SESSION['uname'])) {
    include "unavbar.php";
    include "comfig.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="patient_idport" content="width=device-width, initial-scale=1.0">
    <title>Prescribe Patient</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">


</head>


<body>
    <div class="container">
        <div class="P-2">
            <h4 class="text-center bg-light text-secondary p-2">DIAGNOSIS</h4>
        </div>
        <?php if (isset($_GET['error'])) {?>
                           <p class="error"><?php echo $_GET['error']; ?></p>
                           <?php } ?>
                           
                       <?php if (isset($_GET['success'])) {?>
                           <p class="success"><?php echo $_GET['success']; ?></p>
                           <?php } ?>

        <?php
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
        ?>

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
                <tbody id="myTable">
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td class="btn-group btn-group-justified">
                            <a href="view_history.php?history=<?php echo $row["id"]; ?>" class="badge text-light bg-secondary">Previous Treatment History</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <form method="POST" action="user_prescribe_diagnosis.php">
            <input type="hidden" class="form-control" value="<?= $id; ?>" id="patient_id" name="patient_id" placeholder="Patient ID" required>
            <div class="container py-2">
                <div class="card ">
                    <div class="row px-4">
                        <h5 class="text-center">Diagnosis</h5>
                        <div class="col-md-6">
                            <div class="form-group">
                            <select name="disease[]" class="form-select" required multiple>
                                    <option disabled selected><b>Respiratory diseases</b></option>
                                    <option value="Pneumia">Pneumia</option>
                                    <option value="TB">TB</option>
                                    <option value="Pleural">Pleural</option> 
                                    <option value="Tuberculosis">Tuberculosis</option> 
                                    <option value="Acute respiratory infection">Acute respiratory infection</option>
                                    <option value="Upper respiratory tract infection">Upper respiratory tract infection</option>
                                    <option value="Covid 19">Covid 19</option> 
                                    <option disabled selected><b>Cardiovascular diseases</b></option>
                                    <option value="Hypertension">Hypertension</option>
                                    <option value="Rheumatic heart disease">Rheumatic heart disease</option> 
                                    <option value="Rheumatic heart fever">Rheumatic heart fever</option>
                                    <option value="Vascular heart fever">Vascular heart fever</option>
                                    <option value="Heart attack">Heart attack</option>
                                    <option disabled selected><b>Gastro intestine diseases</b> </option>
                                    <option value="Gastritis">Gastritis</option>
                                    <option value="Pectic ulcer disease">Pectic ulcer disease</option> 
                                    <option value="Gastrol oesophagal reflus disease">Gastrol oesophagal reflus disease</option>
                                    <option value="Abnaminal mass">Abnaminal mass</option>
                                    <option value="Appendix mass">Appendix mass</option> 
                                    <option value="Tuber ovlian mass">Tuber ovlian mass</option>
                                    <option disabled selected><b> Extrimites diseases</b></option>
                                    <option value="Fractures">Fractures</option>
                                    <option value="Masses">Masses</option> 
                                    <option value="Cancers">Cancers</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" id="diseaseContainer">
                                <!-- Duration text areas will be dynamically generated here -->
                            </div>
                        </div>
                    </div>

                    <div class="card p-2 text-center">

                        <div class="col-md-12">
                        <h5 class="text-center">Diagnostic work up</h5>
                            <div class="dropdown d-inline-block">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="sendRequestDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Send Test Request
                                </button>
                                <div class="dropdown-menu" aria-labelledby="sendRequestDropdown">
                                    <a class="dropdown-item" href="send_to_lab.php?send=<?php echo $id; ?>">Lab Request</a>
                                    <a class="dropdown-item" href="radiology_page.php?page=<?php echo $id; ?>">Radiology Request</a>
                                    <a class="dropdown-item" href="hiv_test_request.php?hiv_test=<?php echo $id; ?>">HIV Test</a>
                                </div>
                            </div>

                            <div class="dropdown d-inline-block">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="viewResultsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    View Results
                                </button>
                                <div class="dropdown-menu" aria-labelledby="viewResultsDropdown">
                                    <a class="dropdown-item" href="View_lab_results.php?view_results=<?php echo $id; ?>">Lab Results</a>
                                    <a class="dropdown-item" href="radiology_view.php?viewing=<?php echo $id; ?>">Radiology Results</a>
                                    <a class="dropdown-item" href="hiv_test_results.php?hiv_results=<?php echo $id; ?>">HIV Results</a>
                                </div>
                            </div>
                        </div>
                     </div>
                       
                        <div class="card text-center p-2">
                            <div class="">
                                <h5 class="">Patient Management</h5>
<hr>
                            <div class="row px-4">
                                <h5 class="text-center">Assigning Drugs  and dosages</h5>
                                <div class="col-md-6">
                                    <div class="form-group">
                                 
                                            <select name="drug[]" class="form-select" required multiple onchange="showNotes(this)">
                                            <?php
                                            // Query the database for drugs
                                            $sql = "SELECT * FROM drug ORDER BY drug_name ASC";
                                            $result = mysqli_query($mysqli, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value='" . $row['drug_name'] . "'>" . $row['drug_name'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" id="drugContainer">
                                        <!-- Drug dosage text areas will be dynamically generated here -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                  
                              
                                    <div class="dropdown d-inline-block">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="viewResultsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Select other management 
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="viewResultsDropdown">
                                        
                                        <a class="dropdown-item" href="inpatient_form.php?view=<?php echo $id; ?>">Admit Patient</a>
                                        <a class="dropdown-item" href="consultant_request.php?request=<?php echo $id; ?>">Counselling</a>
                                    </div>
                                   </div>   
                            
                        </div>
                    </div>
                    <div class="form-group py-2 text-center">
                        <button type="submit" class="btn btn-primary" name="submit">Proceed</button>
                        <a class="btn btn-secondary" href="patient_list_user.php">Cancel</a>
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
    $('select[name="disease[]"]').change(function() {
                    var selectedSymptoms = $(this).val();
                    var diseaseContainer = $('#diseaseContainer');
                    diseaseContainer.empty();

                    if (selectedSymptoms.length > 0) {
                    selectedSymptoms.forEach(function(symptom) {
                        var symptomText = '<span>' + symptom + '</span><br>';
                        diseaseContainer.append(symptomText);
                    });
                    }
                });


            $('select[name="drug[]"]').change(function() {
                var selectedDrug = $(this).val();
                var drugContainer = $('#drugContainer');
                drugContainer.empty();

                if (selectedDrug.length > 0) {
                    selectedDrug.forEach(function(drug) {
                        var drugInput = '<input type="text" class="form-control" name="drugContainer[]" placeholder="Enter dosage and drug duration"><br>';
                        drugContainer.append(drugInput);
                    });
                }
            });
        });
    </script>

</body>

</html>
<?php
} else {
    header("Location: user_login.php");
}
?>