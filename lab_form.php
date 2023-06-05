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
  <title>Send lab results request form</title>
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

    /* Style for the form submit button */
    form button[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
    }

    /* Style for the form submit button on hover */
    form button[type="submit"]:hover {
      background-color: #45a049;
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
<body>
<?php
if(isset($_GET['respond']) && isset($_GET['test'])) {
  $test = $_GET['test'];
  $id = $_GET['respond'];
  $sql2 = "SELECT * FROM patient WHERE id='$id'";
  $result2 = $mysqli->query($sql2);

  $row = $result2->fetch_assoc();
  $id = $row['id'];
  $name = $row['name']; 
}
?>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <form method="post" action="lab_action.php" class="border p-3 rounded">
        <h1 class="mb-3 text-center"><i class="fas fa-calendar-plus"></i> Sending lab results</h1>
        <?php if (isset($_GET['error'])) {?>
          <p class="error text-center"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <?php if (isset($_GET['success'])) {?>
          <p class="success text-center"><?php echo $_GET['success']; ?></p>
        <?php } ?>
        <div class="mb-3">
          <input type="hidden" class="form-control" value="<?= $id; ?>" id="patient_id" name="patient_id" placeholder="Patient ID" required> 
          <label for="name" class="form-label"><i class="fas fa-user"></i> Patient Name</label>
          <input type="text" class="form-control" value="<?= $name; ?>" name="name" readonly>
        </div>
        <div class="mb-3">
          <label for="test" class="form-label"><i class="fas fa-comment-medical"></i> Test Request:</label>
          <input type="text" class="form-control" value="<?= $test; ?>" name="test" readonly>
        </div>
        <div class="mb-3">
          <label for="results" class="form-label"><i class="fas fa-comment-medical"></i> Lab Results:</label>
          <textarea name="results" id="results" rows="2" required class="form-control"></textarea>
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
