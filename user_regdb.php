<?php 
    session_start();
    include "comfig.php";

    if (isset($_POST['uname']) && isset($_POST['pwd']) && 
        isset($_POST['prof']) && isset($_POST['re_pwd'])){

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

            //checking if the user exit
           $sql = "SELECT * FROM user WHERE prof ='$prof' AND uname='$uname'";
           if (mysqli_num_rows($mysqli->query($sql)) > 0){
                header ("Location: user_reg.php?error=The username already exit&$user_data");
                exit();
           }else {
            //insert user
                $sql2 = "INSERT INTO user(prof, uname, pwd) 
                VALUES('$prof', '$uname', '$pwd')";
                 if ($mysqli->query($sql2) === TRUE){
                    header ("Location: user_reg.php?success=Successfully registered");
                    exit();
                 }else{
                    header ("Location: user_reg.php?error=unknown error&$user_data");
                    exit();
                 }
           }
        }
    }else{
        
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
?>