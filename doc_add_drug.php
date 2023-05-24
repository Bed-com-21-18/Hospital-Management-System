<?php
if (isset($_SESSION['id']) && isset($_SESSION['uname'])){
  include "comfig.php";
  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Adding New Drug</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
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
  background-color: primary;
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
<body>

<!-- form adding drug data -->
<div class="container mt-5">
<form method="POST" action="doc_add_drug_action.php">
  <div class="form-group">
    <h2>Adding New Drug</h2>
    <label for="drug_name">Drug Name:</label>
    <input type="text" class="form-control" name="drug_name" id="drug_name" required>
  </div>

  <div class="form-group">
    <label for="drug_price">Price:</label>
    <input type="number" class="form-control" name="drug_price" id="drug_price" required>
  </div>

  <div class="form-group">
    <label for="status">Status:</label>
    <select class="form-control" name="status" id="status" required>
      <option>Click to select</option>
      <option value="available">Available</option>
      <option value="not available">Not Available</option>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Add Drug</button>
 <button onclick="history.back();" class="btn btn-secondary">Cancel</button> 

</form>
</div>

</body>
</html>
<?php 
    }else {
        header("Location: home.php");
        exit();
    }
?> 
