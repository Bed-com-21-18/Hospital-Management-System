<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['uname'])) {
    include "unavbar.php";
    include "comfig.php";
    ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container mt-5">
  <form method="POST" action="update_drug_action.php">
    <div class="form-group">
    <h2>Updating Drug</h2>
    <?php
  
                if(isset($_GET['view'])){
              $id = $_GET['view'];
              $sql2 = "SELECT * FROM drug WHERE id='$id'";
              $result2 = $mysqli->query($sql2);
            
                  $row = $result2->fetch_assoc();
                  $drug_name = $row['drug_name'];
                  $drug_price = $row['drug_price2'];
                  $status = $row['status'];   
                }
            ?>
            <div class="form-group">
             <input type="hidden" class="form-control" value="<?= $id; ?> "name="drug_id" id="drug_id" required>
                </div>
                <label for="drug_name">Drug Name:</label>
                <input type="text" class="form-control" value="<?= $drug_name; ?> "name="drug_name" id="drug_name" required>
                </div>
                <div class="form-group">
                <label for="drug_price">Price:</label>
                <input type="number" class="form-control" value="<?= $drug_price; ?>"name="drug_price" id="drug_price"required>
                </div>

                <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control"value="<?= $status; ?>" name="status" id="status"required>
            <option>Click to select</option>
                <option value="available">Available</option>
                <option value="not available">Not Available</option>
            </select>
            </div>
    <button type="submit" class="btn btn-primary">Update Drug</button>
    
    <button onclick="nurse_dashboard.php" class="btn btn-secondary">Cancel</button>
  </form>
</div>

</body>
</html>
<?php
} else {
    header("Location: home.php");
    exit();
}
?>