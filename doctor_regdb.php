<?php 
    session_start();
    include "comfig.php";

    $id = 0;
    $update = false;
    $prof = '';
    $uname = '';
    $pwd = '';

    if (isset($_POST['save'])){
        $uname = $_POST['uname'];
        $prof = $_POST['prof'];
        $doctor = $_POST['doctor'];
        $pwd = $_POST['pwd'];
        $re_pwd = $_POST['re_pwd'];

        //validation
        function validate($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $prof = validate($_POST['prof']);
        $uname = validate($_POST['uname']);
        $pwd = validate($_POST['pwd']);
        $re_pwd = validate($_POST['re_pwd']);

        $user_data = 'uname='. $uname. '&prof='. $prof; 

        if (empty($prof)) {
            header ("Location: doctor_reg.php?error=Proffessional is required&$user_data");
            exit();
        }
        else if (empty($uname)) {
            header ("Location: doctor_reg.php?error=Username is required&$user_data");
            exit();
        }
        else if (empty($pwd)) {
            header ("Location: doctor_reg.php?error=Password is required&$user_data");
            exit();
        }
        else if(empty($re_pwd)) {
            header ("Location: doctor_reg.php?error=Re enter password&$user_data");
            exit();
        } else if($pwd !== $re_pwd) {
            header ("Location: doctor_reg.php?error=The comfimation password does not match&$user_data");
            exit();
        }else {
            //hashing password
             $pwd = md5($pwd);

            //checking if the user exit
           $sql = "SELECT * FROM doctor WHERE prof ='$prof' AND uname='$uname'";
           if (mysqli_num_rows($mysqli->query($sql)) > 0){
                header ("Location: doctor_reg.php?error=The username already exit&$user_data");
                exit();
           }else {
            //insert user
                $sql2 = "INSERT INTO doctor (prof, uname, pwd) 
                VALUES('$prof', '$uname', '$pwd')";
                 if ($mysqli->query($sql2) === TRUE){
                    header ("Location: doctor_reg.php?success=Successfully registered");
                    exit();
                 }else{
                    header ("Location: doctor_reg.php?error=unknown error&$user_data");
                    exit();
                 }
           }
        }
    }else{
        
    }

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
      
        $sql = "DELETE FROM doctor WHERE id='$id'";
      
        if ($mysqli->query($sql) === TRUE) {
                  echo "<script>alert('Successfully Deleted');
                    window.location.href = 'doctor_reg.php';
                    </script>";
          } else {
          //echo "Error: " . $sql . "<br>" . $mysqli->error;
                  echo "<script>alert('Failed to Delete');
                    window.location.href('doctor_reg.php');
                    </script>";
      
          }
      }

      if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $update = true;
        $sql2 = "SELECT * FROM doctor WHERE id='$id'";
        $result2 = $mysqli->query($sql2);
      
            $row = $result2->fetch_assoc();
            $id = $row['id'];
            $uname = $row['uname'];
            $prof = $row['prof'];
            $pwd = $row['pwd'];
                 
        
      }

      if(isset($_POST['update'])){
        $id = $_POST['id'];
        $uname = $_POST['uname'];
        $prof = $_POST['prof'];

        $sql3 = "UPDATE doctor SET uname='$uname', prof='$prof' WHERE id='$id'";
        $result3 = $mysqli->query($sql3);

        header("Location: doctor_reg.php?success=Successfully updated");
        exit();
    }
?>