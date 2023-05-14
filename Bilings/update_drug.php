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
    <h2>Update Drug</h2>
                <label for="drug_name">Drug Name:</label>
                <input type="text" class="form-control" name="drug_name" id="drug_name" required>
                </div>

                <div class="form-group">
                <label for="symptoms">Symptoms:</label>
                <input type="text" class="form-control" name="symptoms" id="symptoms"required>
                </div>
                <div class="form-group">
            <label for="status">Patient Type:</label>
            <select class="form-control" name="patient_type" id="patient_type"required>
            <option>Click to select</option>
                <option value="Children">Children</option>
                <option value="Adult">Adult</option>
            </select>
            </div>
                <div class="form-group">
            <label for="status">Dosage:</label>
            <select class="form-control" name="dosage" id="dosage" required>
            <option>Click to select</option>
            <option value="1/2 morning, afternoon and evening">1/2 morning, afternoon and evening</option>
                <option value="1 morning, afternoon and evening">1 morning, afternoon and evening</option>
                <option value="2 morning, afternoon and evening">2 morning, afternoon and evening</option>
                
            </select>
            </div>

                <div class="form-group">
                <label for="drug_price">Price:</label>
                <input type="number" class="form-control" name="drug_price" id="drug_price"required>
                </div>

                <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" name="status" id="status"required>
            <option>Click to select</option>
                <option value="available">Available</option>
                <option value="not available">Not Available</option>
            </select>
            </div>
    <button type="submit" class="btn btn-primary">Update Drug</button>
    <a href="../dashboard.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>

</body>
</html>
