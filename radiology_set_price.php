<?php
include 'user_regdb.php';
if (isset($_SESSION['id']) && isset($_SESSION['uname'])){
 
  include "comfig.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lab Test Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .form-container {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
  </style>
</head>
<body style ="margin-top:200px">
  <!--NavBar-->
 <div class="container-fluid mb-5"> <?php include 'unavbar.php'; ?></div>

  <div class="container p-5">
    <div class="row mt-5">
      <div class="col-md-6 offset-md-3">
        <div class="form-container">
          <form action="radiology_set_price_action.php" method="POST" onsubmit="return validateForm()">
          <div class="card-header mb-1"> 
            <h4 class="text-center">Setting Radiology Test Price</h4>
            </div>
            <div class="form-group">
              <?php if (isset($_GET['error'])) {?>
                <p class="error text-center"><?php echo $_GET['error']; ?></p>
              <?php } ?>
              <?php if (isset($_GET['success'])) {?>
                <p class="success text-center"><?php echo $_GET['success']; ?></p>
              <?php } ?>
              <label for="test_name">Test Name:</label>
              <div class="form-group">
              <select class="form-select" id="test_name" name="test_name" required>
                <option  disabled selected>Select Radiology test</option>
                <option value="X-ray">X-ray</option>
                <option value="UltraSound Scanning">UltraSound Scanning</option>
                <option value="Magnetic resonance imaging">Magnetic resonance imaging</option>
           
                
              </select>
              </div>
            </div>
            <div class="form-group">
              <label for="price">Price:</label>
              <input type="number" class="form-control" id="price" name="price" step="0.01" required>
              <small id="priceWarning" class="text-danger" style="display: none;">Price should be a positive number.</small>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Set Price</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    function validateForm() {
      var priceInput = document.getElementById('price');
      var priceWarning = document.getElementById('priceWarning');
      var priceValue = parseFloat(priceInput.value);

      if (isNaN(priceValue) || priceValue < 0) {
        priceWarning.style.display = 'block';
        return false;
      } else {
        priceWarning.style.display = 'none';
        return true;
      }
    }
  </script>
</body>
</html>

<?php 
    } else {
        header("Location: home.php");
        exit();
    }
?>
