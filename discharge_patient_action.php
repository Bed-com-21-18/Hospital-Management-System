<?php

include "comfig.php";

 
if(isset($_POST['discharge'])){
  $discharge_status = $_POST['discharge_status'];
  $id = $_POST['id'];
  $discharge_date = $_POST['discharge_date'];

  $sql = "UPDATE patient SET discharge_status = '$discharge_status', 
  discharge_date = '$discharge_date' WHERE id = '$id'";
   $result3 = $mysqli->query($sql);

   if ($mysqli->query($sql) === TRUE) {
      echo "<script>alert('Successfully Submitted');
      window.location.href = 'inpatient.php';
      </script>";
   } else {
   //echo "Error: " . $sql . "<br>" . $mysqli->error;
      header ("Location: discharge_patient.php?error=unknown error&$user_data");
      exit();

   }
  

  // Close the database mysq$mysqliection
  mysqli_close($mysqli);

}
?>
