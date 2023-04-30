<?php 
// data base connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_ms";

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>