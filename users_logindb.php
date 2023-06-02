<?php 
    session_start();
    include "comfig.php";

    $role = "";
    if (isset($_POST['login'])){
        $uname = $_POST['uname'];
        $pwd = $_POST['pwd'];
        
   
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
            header("Location: users_login.php?error=User name isrequired");
            exit();
        }else if(empty($pwd)) {
            header("Location: users_login.php?error=Password is required");
            exit();
        }
        
             //hashing password
            //  $pwd = md5($pwd);
            
            $sql = "SELECT * FROM users WHERE uname='$uname' AND pwd='$pwd'";
            $result = $mysqli->query($sql);

            if($result->num_rows === 1){
                  $row = $result->fetch_assoc();
                   if($row['uname'] === $uname && $row['role'] == 'other_user'){
                        $_SESSION['uname'] = $row['uname'];
                        $_SESSION['prof'] = $row['prof'];
                        $_SESSION['id'] = $row['id'];

                        header("Location: nurse_dashboard.php");
                        exit();
                   }
                    else if($row['uname'] === $uname && $row['role'] == 'admin'){
                        $_SESSION['uname'] = $row['uname'];
                        $_SESSION['prof'] = $row['prof'];
                        $_SESSION['id'] = $row['id'];

                        header("Location: dashboard.php");
                        exit();
                } else if($row['uname'] === $uname && $row['role'] == 'doctor'){
                    $_SESSION['uname'] = $row['uname'];
                    $_SESSION['prof'] = $row['prof'];
                    $_SESSION['id'] = $row['id'];

                    header("Location: doc_dashboard.php");
                    exit();
            }else {
                    header("Location: users_login.php?error=Incorrect username or paasword");
                    exit();
                }
               
            } else {
                header("Location: users_login.php?error=Incorrect username or password");
                exit();
            }
       
    }else {
    
    }
     