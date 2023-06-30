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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Clearance</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-RXdRUZ72MkRiR7Kj1MZrtI+2E5a5ntwLV5z+sWjlKgrP5N9tFVrMk14TwNNHDPMe0D1ELb/2COwleHc8z0/WTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-57NKyaJFZhCGbzEWz8uV7IJ+g1hhn2S2jZ/j+oJFupafyksGp4KsB4+8xv1MWnX9B0SzmjKnmqlTpfT0Hupufw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    /* Style for the body */
body {
  background-color: #f2f2f2;
  font-family: Arial, sans-serif;
}

/* Style for the form */
form {
  background-color: #ffffff;
  padding: 20px;
}

/* Style for the form header */
form h1 {
  margin-top: 0;
}

/* Style for the form input fields */
form input[type="number"],
form input[type="date"],
form input[type="time"],
form select,
form textarea {
  width: 100%;
  padding: 10px;
  border: 2px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-bottom: 10px;
  font-size: 16px;
}

/* Style for the form input fields when they are focused */
form input[type="number"]:focus,
form input[type="date"]:focus,
form input[type="time"]:focus,
form select:focus,
form textarea:focus {
  border-color: #4CAF50;
}


/* Style for the form error message */
form .error {
  color: red;
  margin-top: 5px;
  font-size: 14px;
}
    @media (max-width: 768px) {
      .col-md-6 {
        max-width: 100%;
      }
    }
  </style>
</head>
<body  style ="margin-top:200px">
<?php
    if(isset($_GET['add_status'])){
  $id = $_GET['add_status'];
  $sql2 = "SELECT * FROM patient WHERE id='$id'";
  $result2 = $mysqli->query($sql2);

      $row = $result2->fetch_assoc();
      $id = $row['id'];
      $name = $row['name'];  
      $_SESSION['name'] = $row['name']; 
      $_SESSION['id'] = $row['id']; 
  
} ?>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <form method="post" action="finance_status_action.php" class="border p-3 rounded">
          <div class = "card-header mb-1 ">
          <h4 class="text-center"><i class="fas fa-calendar-plus"></i> Clearance of Patient Bill</h4>
          </div>
          <?php if(isset($_SESSION['success_message'])) { ?>
          <div class="alert alert-success" role="alert">
            <?php echo $_SESSION['success_message']; ?>
          </div>
          <?php unset($_SESSION['success_message']); } ?>
          <?php if(isset($_SESSION['error_message'])) { ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['error_message']; ?>
          </div>
          <?php unset($_SESSION['error_message']); } ?>
          <div class="mb-3">
          <input type="hidden" class="form-control" value="<?= $id; ?>" id="patient_id" name="patient_id" placeholder="Patient ID" required> 
          <label for="name" class="form-label"><i class="fas fa-user"></i> Patient Name</label>
          <input type="text" class="form-control" value="<?= $name; ?>" name="name" readonly>
          </div>
          <div class="mb-3">
            <label for="results" class="form-label"><i class="fas fa-comment-medical"></i> Bill Status:</label>
            <select id="status" name="status" required class="form-select">
                                        <option disabled selected>Select Bill Status</option>
                                        <option value="Cleared">Cleared</option>
                                    </select>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-2m8WY5ch5vHVp5CmI/CIZM8hBE+1cuaJ/+fVZdHEkQ2jDlmzOJLv1x0xZWxxTy2C31Nfk9UZKO6UZT6wq3JgWw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js" integrity="sha512-FgvcWWtB4ax+j4eJ7V10zykOuPG5b5TX00S/PrCUYX9v+q3qlJZmMYhF+RbL15Hz2+e7VJz1mcuVTYR8J0QcmQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html> 

<?php 
    }else {
        header("Location: home.php");
        exit();
    }
?> 

