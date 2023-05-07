<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hms";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
 
// $conn = new mysqli("localhost", "root", "", "hospital-management-system");
if(isset($_POST['add'])){
    $name=$_POST['name'];
    $date=$_POST['date'];
    $gender=$_POST['gender'];
    $nid=$_POST['id'];
    $email=$_POST['email'];
    $phoneNumber=$_POST['phoneNumber'];
    $district=$_POST['district'];
    $village=$_POST['village'];
    $residential=$_POST['residential'];

    $query="INSERT INTO patient (name,date,gender,id,email,phoneNumber,district,village,residential) 
    VALUES(?,?,?,?,?,?,?,?,?)";
    $stmt=$conn->prepare($query);
    $stmt-> bind_param ('sssdsssss', $name, $date, $gender, $nid,$email, $phoneNumber, $district, $village, $residential);
    $stmt->execute();
    header('location:index.php');
    $_SESSION['response']= "Successfully Added a Patient!!!";
    $_SESSION['res_type']= "success";
}
?>
