<?php 
    session_start();
    include "comfig.php";

    $id = 0;
    $update = false;
    $prof = '';
    $uname = '';
    $pwd = '';
    $email = '';

    if (isset($_POST['save'])){
        $uname = $_POST['uname'];
        $prof = $_POST['prof'];
        $other_user = $_POST['other-user'];
        $pwd = $_POST['pwd'];
        $role = $_POST['role'];
        $email = $_POST['email'];
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
            header ("Location: user_reg.php?error=Proffessional is required&$user_data");
            exit();
        }
        else if (empty($uname)) {
            header ("Location: user_reg.php?error=Username is required&$user_data");
            exit();
        }
        else if (empty($pwd)) {
            header ("Location: user_reg.php?error=Password is required&$user_data");
            exit();
        }
        else if(empty($re_pwd)) {
            header ("Location: user_reg.php?error=Re enter password&$user_data");
            exit();
        } else if($pwd !== $re_pwd) {
            header ("Location: user_reg.php?error=The comfimation password does not match&$user_data");
            exit();
        }else {
            //hashing password
            $pwd = md5($pwd);
              //redifining empty role
            if ($role === '') {
                $role = $prof;
            } else{

            //checking if the user exit
           $sql = "SELECT * FROM user WHERE prof ='$prof' AND uname='$uname'";
           if (mysqli_num_rows($mysqli->query($sql)) > 0){
                header ("Location: user_reg.php?error=The username already exist&$user_data");
                exit();
           }else {
            //insert user
            if ($role === 'Admin') {
                $sql2 = "INSERT INTO admins (prof,role, uname, email, pwd) 
                VALUES('$prof', '$role', '$uname', '$email', '$pwd')";
                 if ($mysqli->query($sql2) === TRUE){
                    header ("Location: user_reg.php?success=Successfully registered");
                    exit();
                 }else{
                    header ("Location: user_reg.php?error=unknown error&$user_data");
                    exit();
                 }
            }
            else if($role === 'Doctor') {
                $sql2 = "INSERT INTO doctor (prof, role, uname, email, pwd) 
                VALUES('$prof', '$role','$uname', '$email', '$pwd')";
                 if ($mysqli->query($sql2) === TRUE){
                    header ("Location: user_reg.php?success=Successfully registered");
                    exit();
                 }else{
                    header ("Location: user_reg.php?error=unknown error&$user_data");
                    exit();
                 }

            }
            else{
                $sql2 = "INSERT INTO user (prof, role, uname, email, pwd) 
                VALUES('$prof', '$role', '$uname', '$email', '$pwd')";
                 if ($mysqli->query($sql2) === TRUE){
                    header ("Location: user_reg.php?success=Successfully registered");
                    exit();
                 }else{
                    header ("Location: user_reg.php?error=unknown error&$user_data");
                    exit();
                 }
            }
               
           }
        }
         }
    }
    else{
        
    }

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
      
        $sql = "DELETE FROM user WHERE id='$id'";
      
        if ($mysqli->query($sql) === TRUE) {
                  echo "<script>alert('Successfully Deleted');
                    window.location.href = 'user_reg.php';
                    </script>";
          } else {
          //echo "Error: " . $sql . "<br>" . $mysqli->error;
                  echo "<script>alert('Failed to Delete');
                    window.location.href ='user_reg.php';
                    </script>";
      
          }
      }

      if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $update = true;
        $sql2 = "SELECT * FROM user WHERE id='$id'";
        $result2 = $mysqli->query($sql2);
      
            $row = $result2->fetch_assoc();
            $id = $row['id'];
            $uname = $row['uname'];
            $prof = $row['prof'];
            $pwd = $row['pwd'];
            $email = $row['email'];
                 
        
      }

      if(isset($_POST['update'])){
        $id = $_POST['id'];
        $uname = $_POST['uname'];
        $prof = $_POST['prof'];
        $email = $row['email'];

        $sql3 = "UPDATE user SET uname='$uname',  email = '$email', prof='$prof' WHERE id='$id'";
        $result3 = $mysqli->query($sql3);

        header("Location: user_reg.php?success=Successfully updated");
        exit();
    }

?>