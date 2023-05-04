<!DOCTYPE html>
<html>
<head>
  <title>Add Drug</title>
</head>
<body>
  <h2>Add Drug</h2>
  <form action="insert_drugprice.php" method="POST">
    <label for="drug_name">Drug Name:</label>
    <input type="text" name="drug_name" required><br><br>
    
    <label for="drug_fee">Drug Fee:</label>
    <input type="text" name="drug_fee" required><br><br>
    
    <label for="prescription_fee">Prescription Fee:</label>
    <input type="text" name="prescription_fee" required><br><br>
    
    <input type="submit" value="Submit">
  </form>
</body>
</html>
