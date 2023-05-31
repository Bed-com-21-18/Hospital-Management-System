<?php
// Connect to the database
include 'comfig.php';

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
 
// $conn = new mysqli("localhost", "root", "", "hospital-management-system");
if(isset($_POST['add'])){
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    $next_of_kin=$_POST['next_of_kin'];
    $religion=$_POST['religion'];
    $occupation = $_POST['occupation'];
    $date=$_POST['date'];
    $birthYear = date('Y', strtotime($date));
    $currentYear = date('Y');
    $age = $currentYear - $birthYear;


    $user_data = 'name='. $name. '&date='. $date; 

    $sql = "SELECT * FROM patient WHERE date ='$date' AND name='$name'";
    $result = $mysqli->query($sql);

    if (mysqli_num_rows($result) > 0){
        header ("Location: patient_reg.php?error=The username already exist&$user_data");
        exit();
     }else {
    //insert user
        $sql2 = "INSERT INTO patient (name,date,gender,address,next_of_kin,religion,occupation) 
        VALUES('$name', '$age', '$gender', '$address', '$next_of_kin', '$religion', '$occupation')";
         if ($mysqli->query($sql2) === TRUE){
            // header ("Location: patient_reg.php?success=Successfully registered");
            // exit();
            echo "<script>alert('Successfully Submitted');
            window.location.href = 'patient_reg.php';
            </script>";
         }else{
            header ("Location: patient_reg.php?error=unknown error&$user_data");
            exit();
         }
   }
}
?>
