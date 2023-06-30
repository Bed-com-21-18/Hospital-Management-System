<?php
include 'user_regdb.php';
if (isset($_SESSION['id']) && isset($_SESSION['uname'])){
    include "comfig.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prescribe Patient</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#ward_bed').change(function() {
        var selectedWard = $(this).val();
        if (selectedWard === 'Paediatrics Ward' || selectedWard === 'Surgical Ward' || selectedWard === 'Medical Ward') {
          $('#room_number').show();
        } else {
          $('#room_number').hide();
        }
      });
    });
  </script>
</head>

<body>
  <!-- NavBar -->
  <div class="container-fluid mb-5">
    <?php include 'unavbar.php'; ?>
  </div>

  <div class="container p-5">
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
            <th>Sex</th>
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
      <div class="form-group p-2">
        <label>Ward</label>
        <select name="ward_bed" type="text" value="" id="ward_bed" required class="form-select">
          <option value="">Select Ward</option>
          <option value="Paediatrics Ward">Paediatrics</option>
          <option value="Surgical Ward">Surgical Ward</option> 
          <option value="Medical Ward">Medical Ward</option>
          <option value="Obestetrics Ward">Obestetrics Ward</option>
          <option value="Gynaecology Ward">Gynaecology Ward</option>
        </select>
      </div>

      <div class="form-group" id="room_number" style="display: none;">
        <label>Room Number</label>
        <select name="room_number" class="form-select">
          <option value="">Select Room Number</option>
          <?php
          for ($i = 1; $i <= 30; $i++) {
            echo "<option value='$i'>$i</option>";
          }
          ?>
        </select>
      </div>

      <div class="form-group">
        <label>Treatment Plan</label>
        <textarea name="treatment_plan" class="form-control" type="text" value="" id="symptoms" placeholder="Write a treatment plan..."></textarea>
      </div>
      <button type="submit" align-center class="btn btn-primary">Proceed</button>&nbsp;&nbsp;&nbsp;&nbsp;
      <a class="btn btn-secondary" href="javascript:history.back()">Go Back</a>
    </form>
  </div>
  
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
