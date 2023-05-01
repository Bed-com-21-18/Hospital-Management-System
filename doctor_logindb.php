<?php 
    session_start();
    include "comfig.php";

    if (isset($_POST['uname']) && isset($_POST['pwd'])){

         //validation
         function validate($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $uname = validate($_POST['uname']);
        $pwd = validate($_POST['pwd']);

        if(empty($uname)) {
            header("Location: doctor_login.php?error=Username required");
            exit();
        }else if(empty($pwd)) {
            header("Location: doctor_login.php?error=Password required");
            exit();
        }else {

             //hashing password
             $pwd = md5($pwd);
            
            $sql = "SELECT * FROM doctor WHERE uname='$uname' AND pwd='$pwd'";
            $result = $mysqli->query($sql);

            if($result->num_rows === 1){
                  $row = $result->fetch_assoc();
                   if($row['uname'] === $uname && $row['pwd'] === $pwd){
                        $_SESSION['uname'] = $row['uname'];
                        $_SESSION['prof'] = $row['prof'];
                        $_SESSION['id'] = $row['id'];

                        header("Location: doc_dashboard.php");
                        exit();
                   }else {
                        header("Location: doctor_login.php?error=Incorrect surname or password");
                        exit();
                   }
                  
            }else {
                header("Location: doctor_login.php?error=Incorrect username or password");
                exit();
            }
        }
    }else {
    
    }
     