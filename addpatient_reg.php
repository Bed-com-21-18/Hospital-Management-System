<?php
// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Include the database connection code
  include 'comfig.php';

  // Get the form data
  $name = $_POST['name'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $occupation = $_POST['occupation'];
  $mobile = $_POST['mobile'];
  $address = $_POST['address'];

  // Prepare the SQL statement
  $stmt = $pdo->prepare("INSERT INTO patients (name, age, gender, occupation, mobile, address) VALUES (?, ?, ?, ?, ?, ?)");

  // Execute the statement with the form data
  $stmt->execute([$name, $age, $gender, $occupation, $mobile, $address]);

  // Redirect to the success page
  header('Location: home.php');
  exit;
}
?>
