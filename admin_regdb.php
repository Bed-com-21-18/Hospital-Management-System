<?php 
    session_start();
    include "comfig.php";

    $id = 0;
    $update = false;
    $prof = '';
    $uname = '';
    $email = '';
    $pwd = '';
   

    if (isset($_POST['save'])){
            $uname = $_POST['uname'];
            $email = $_POST['email'];
            $prof = $_POST['prof'];
            $admin = $_POST['admin'];
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
        $email = validate($_POST['email']);
        $pwd = validate($_POST['pwd']);
        $re_pwd = validate($_POST['re_pwd']);

        $user_data = 'uname='. $uname. '&email='. $email. '&prof='. $prof; 

        if (empty($prof)) {
            header ("Location: admin_reg.php?error=Proffessional is required&$user_data");
            exit();
        }
        else if (empty($uname)) {
            header ("Location: admin_reg.php?error=Username is required&$user_data");
            exit();
        }
        else if (empty($email)) {
            header ("Location: admin_reg.php?error=Email is required&$user_data");
            exit();
        }
        else if (empty($pwd)) {
            header ("Location: admin_reg.php?error=Password is required&$user_data");
            exit();
        }
        else if(empty($re_pwd)) {
            header ("Location: admin_reg.php?error=Re enter password&$user_data");
            exit();
        } else if($pwd !== $re_pwd) {
            header ("Location: admin_reg.php?error=The comfimation password does not match&$user_data");
            exit();
        }else {
            //hashing password
            // $pwd = md5($pwd);

            //checking if the user exit
           $sql = "SELECT * FROM users WHERE prof ='$prof' AND uname='$uname' AND email='$email'";
           if (mysqli_num_rows($mysqli->query($sql)) > 0){
                header ("Location: admin_reg.php?error=The username already exit&$user_data");
                exit();
           }else {
            //insert user
                $sql2 = "INSERT INTO users(prof, uname, email, role, pwd) 
                VALUES('$prof', '$uname', '$email','$admin', '$pwd')";
                 if ($mysqli->query($sql2) === TRUE){
                    header ("Location: admin_reg.php?success=Successfully registered");
                    exit();
                 }else{
                    header ("Location: admin_reg.php?error=unknown error&$user_data");
                    exit();
                 }
           }
        }
    }else{
        
    }

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
      
        $sql = "DELETE FROM users WHERE id='$id'";
      
        if ($mysqli->query($sql) === TRUE) {
                  echo "<script>alert('Successfully Deleted');
                    window.location.href = 'admin_reg.php';
                    </script>";
          } else {
          //echo "Error: " . $sql . "<br>" . $mysqli->error;
                  echo "<script>alert('Failed to Delete');
                    window.location.href ='admin_reg.php';
                    </script>";
      
          }
      }

      if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $update = true;
        $sql2 = "SELECT * FROM users WHERE id='$id'";
        $result2 = $mysqli->query($sql2);
      
            $row = $result2->fetch_assoc();
            $id = $row['id'];
            $uname = $row['uname'];
            $email = $row['email'];
            $prof = $row['prof'];
            $pwd = $row['pwd'];
                 
        
      }

      if(isset($_POST['update'])){
        $id = $_POST['id'];
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $prof = $_POST['prof'];

        $sql3 = "UPDATE users SET uname='$uname', email='$email', prof='$prof' WHERE id='$id'";
        $result3 = $mysqli->query($sql3);

        header("Location: admin_reg.php?success=Successfully updated");
        exit();
    }
?>