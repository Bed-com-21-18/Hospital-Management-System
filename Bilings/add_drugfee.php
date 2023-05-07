<!DOCTYPE html>
<html>
<head>
  <title>Add Billing Information</title>
</head>
<body>
  <h2>Add Billing Information</h2>
  <form action="insert_billingserver.php" method="POST">
    <label for="patient_id">Patient ID:</label>
    <input type="text" name="patient_id" required><br><br>
    
    <label for="drug_id">Drug ID:</label>
    <input type="text" name="drug_id" required><br><br>
    
    <label for="drug_name">Drug Name:</label>
    <input type="text" name="drug_name" required><br><br>
    
    <label for="drug_quantity">Drug Quantity:</label>
    <input type="text" name="drug_quantity" required><br><br>
    
    <label for="prescription_fee">Prescription Fee:</label>
    <input type="text" name="prescription_fee" required><br><br>
    
    <label for="billing_date">Billing Date:</label>
    <input type="date" name="billing_date" required><br><br>
    
    <input type="submit" value="Submit">
  </form>
</body>
</html>
