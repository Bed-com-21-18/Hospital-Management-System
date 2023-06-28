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
    <br>
    <br>
    <br>
    <br>
    <br>
    
<div class="container">
    <h3 class="text-center bg-light text-secondary">Prescription</h3>
</div>
    
  <!-- prescription form -->
  <div class="container bg-light">
    
    <form method="POST" action="prescribe.php"> 
      <?php
    if(isset($_GET['viewing'])){
  $id = $_GET['viewing'];
  $appointment = $_GET['id'];
  $_SESSION['appoint_id']= $appointment;
  $_SESSION['patient_id'] = $id;
  $sql2 = "SELECT * FROM patient WHERE id='$id'";
  $result2 = $mysqli->query($sql2);

      $row = $result2->fetch_assoc();
      $name = $row['name'];
      $age = $row['age'];
      $date = $row['date']; 
      $gender = $row['gender'];     
  
} ?>
                <hr>
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
                            <a href="doc_view_history.php?history=<?php echo $id ; ?>" class="badge text-light bg-secondary">Previous History</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <form method="POST" action="prescribe_form_action.php">
            <input type="hidden" class="form-control" value="<?= $id; ?>" id="patient_id" name="patient_id" placeholder="Patient ID" required>
            <div class="container py-2">
                <div class="card ">
                    <div class="row px-4">
                        <h5 class="text-center">Signs and symptoms</h5>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="symptoms[]" class="form-select" required multiple>
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
                                    <option value="Nausea">Nausea</option>
                                    <option value="Vomiting">Vomiting</option>
                                    <option value="Passing out losss stools">Passing out losss stools</option>
                                    <option value="Itching">Itching</option>
                                    <option value="General body aches">General body aches</option>
                                    <option value="Skin rash">Skin rash</option>
                                    <option value="Vomiting">Vomiting</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" id="durationContainer">
                                <!-- Duration text areas will be dynamically generated here -->
                            </div>
                        </div>
                    </div>

                    <div class="card ">
                        <div class="row px-4">
                            <h5 class="text-center">Measurements</h5>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="measurement[]" class="form-select" required multiple>
                                        <option value="Temperature">Temperature</option>
                                        <option value="Pulse rate">Pulse rate</option>
                                        <option value="Respiratory rate">Respiratory rate</option>
                                        <option value="Blood pressure">Blood pressure</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="measurementContainer">
                                    <!-- Measurement text areas will be dynamically generated here -->
                                </div>
                            </div>
                        </div>

                        <div class="card ">
                            <div class="row px-4">
                                <h5 class="text-center">General Examination</h5>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="examination[]" class="form-select" onchange="showNotes(this)" required multiple>
                                            <option value="pale">Pale conjunctivae</option>
                                            <option value="unconscious">Unconscious</option>
                                            <option value="alert">Alert</option>
                                        </select>
                                    </div>
                                </div>
                            <div class="col-md-6">
                                <div class="form-group" id="notesContainer">
                                    <!-- Measurement text areas will be dynamically generated here -->
                                </div>
                            </div>
                            </div>

                        <div class="form-group py-2 text-center">
                            <button type="submit" class="btn btn-primary" name="submit">Diagnose</button>
                            <a class="btn btn-secondary" href="doc_dashboard.php">Cancel</a>

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

         

        function showNotes(selectElement) {
            var selectedValue = selectElement.value;
            var notesContainer = document.getElementById("notesContainer");

            if (selectedValue !== "") {
                notesContainer.style.display = "block";
            } else {
                notesContainer.style.display = "none";
            }
        }
    </script>

</body>

</html>
<?php
} else {
    header("Location: home.php");
}
?>










