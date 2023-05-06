<?php  session_start();
            include "dnavbar.php";
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
  function goBack() {
    window.history.back();
  }
  </script>
<body>
  <div class="container">
    <h3>Prescribe Patient</h3>
    <form method="POST" action="prescribe.php">
      <div class="form-group">
        <label for="patient-id">Patient ID:</label>
        <input type="text" class="form-control" id="appoint_id" name="appoint_id" placeholder="Appointment Number" required><br>
      <input type="text" class="form-control" id="patient_id" name="patient_id" placeholder="Patient ID" required> 
      </div>
      <div class="form-group" method="POST" >
        <label for="medical-history"><b>Medical History:</b></label><br>
        <p><i><b>please tick the comprehensive record of a patient's past and present medical conditions</i></b></p>
        <input type="checkbox" name="medical-history[]" value="Diabetes"> Diabetes&nbsp;
        <input type="checkbox" name="medical-history[]" value="High Blood Pressure"> High Blood Pressure&nbsp;
        <input type="checkbox" name="medical-history[]" value="Pregnancy"> Pregnancy&nbsp;
        <input type="checkbox" name="medical-history[]" value="Asthma"> Asthma&nbsp;
        <input type="checkbox" name="medical-history[]" value="Heart Disease"> Heart Disease<br>
        <input type="checkbox" name="medical-history[]" value="Lung Disease"> Lung Disease&nbsp;
        <input type="checkbox" name="medical-history[]" value="Cancer"> Cancer&nbsp;
        <input type="checkbox" name="medical-history[]" value="Kidney Disease"> Kidney Disease&nbsp;
        <input type="checkbox" name="medical-history[]" value="Liver Disease"> Liver Disease<br>
        <input type="checkbox" name="medical-history[]" value="Thyroid Problems"> Thyroid Problems&nbsp;
        <input type="checkbox" name="medical-history[]" value="Autoimmune Disease"> Autoimmune Disease&nbsp;
    </div>
      <div class="form-group" method="POST" >
        <div class="form-group" method="POST" >
          <label for="symptoms"><b>Symptoms:</b></label><br>
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
          <label for="others"><b>Others:</b></label>
          <textarea class="form-control" id="others" name="others" rows="1" ></textarea>
        </div>          
        <button type="submit" class="btn btn-primary">Prescribe</button> &nbsp;&nbsp;&nbsp;&nbsp;
      <button onclick="goBack()" class="btn btn-secondary">Go Back</button>
    </form>
  </div>
  <?php 
        include 'footer.php';
    ?>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
