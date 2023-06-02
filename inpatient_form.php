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

<body>
   
  <div class="container">
    <h3 class="text-center bg-light text-secondary">Admit Patient</h3>
  </div>

  <div class="container bg-light">
    <form method="POST" action="inpatient_form_action.php">
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
      }
      ?>
      <hr>
      <table class="table table-hover" style="overflow:auto">
        <thead class="table table-hover">
          <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
          </tr>
        </thead>
        <tbody id="myTable">
          <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['age']; ?></td> 
            <td><?php echo $row['gender']; ?></td> 
          </tr>
        </tbody>
      </table>
      <div class="mb-3">
      <input type="hidden" class="form-control" value="<?= $id; ?>" id="patient_id" name="patient_id" placeholder="Patient ID" required> 
      </div>
      <div class="form-group">
         <label>Symptom</label>
          <input name="symptoms" class="form-control" type="text" value="" id="symptoms" placeholder="indicate a symptom">
            </div><br>
    
      <div class="mb-3">
        <label for="ward_bed" class="form-label"><i class="fas fa-comment-medical"></i> Assign ward Bed: </label>
        <select name="ward_bed" id="ward_bed" required class="form-control">
          <option value="">Select a bed</option>
          <optgroup label="Ward A">
            <?php
            for ($i = 1; $i <= 6; $i++) {
              echo "<option value='Ward A, Bed $i'>Ward A, Bed $i</option>";
            }
            ?>
          </optgroup>
          <optgroup label="Ward B">
            <?php
            for ($i = 1; $i <= 6; $i++) {
              echo "<option value='Ward B, Bed $i'>Ward B, Bed $i</option>";
            }
            ?>
          </optgroup>
          <optgroup label="Ward C">
            <?php
            for ($i = 1; $i <= 6; $i++) {
              echo "<option value='Ward C, Bed $i'>Ward C, Bed $i</option>";
            }
            ?>
          </optgroup>
          <optgroup label="Ward D">
            <?php
            for ($i = 1; $i <= 6; $i++) {
              echo "<option value='Ward D, Bed $i'>Ward D, Bed $i</option>";
            }
            ?>
          </optgroup>
        </select>
      </div>

      <br><br>
      <button type="submit" class="btn btn-primary">Proceed</button>&nbsp;&nbsp;&nbsp;&nbsp;
      <button class='btn btn-secondary' onclick='window.history.back()'>Go Back</button>
    </form>
  </div>
  
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

<?php 
} else {
    header("Location: home.php");
    exit();
}
?>
