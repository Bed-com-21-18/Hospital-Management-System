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
<body>
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-6 offset-md-3">
        <div class="form-container">
          <form action="laboratoryinsert_price.php" method="POST" onsubmit="return validateForm()">
            <h2 class="text-center mb-4">Setting Test Price</h2>
            <div class="form-group">
              <?php if (isset($_GET['error'])) {?>
                <p class="error text-center"><?php echo $_GET['error']; ?></p>
              <?php } ?>
              <?php if (isset($_GET['success'])) {?>
                <p class="success text-center"><?php echo $_GET['success']; ?></p>
              <?php } ?>
              <label for="test_name">Test Name:</label>
              <select class="form-control" id="test_name" name="test_name" required>
                <option value="" selected disabled>Select a test</option>
                <option value="Haematology">Haematology</option>
                <option value="Biochemistry">Biochemistry</option>
                <option value="Microbiology">Microbiology</option>
                <option value="Parasitology">Parasitology</option>
                <option value="Serology">Serology</option>
              </select>
            </div>
            <div class="form-group">
              <label for="price">Price:</label>
              <input type="number" class="form-control" id="price" name="price" step="0.01" required>
              <small id="priceWarning" class="text-danger" style="display: none;">Price should be a positive number.</small>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
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
