<?php 
session_start();
    include "comfig.php";

    if (isset($_SESSION['id']) && isset($_SESSION['uname'])){
       
        if (isset($_POST['old_pwd']) && isset($_POST['new_pwd']) && 
            isset($_POST['confirm_pwd'])){
    
            //validation
            function validate($data){
                $data = trim($data);
                $data = stripcslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            $old_pwd = validate($_POST['old_pwd']);
            $new_pwd = validate($_POST['new_pwd']);
            $confirm_pwd = validate($_POST['confirm_pwd']);
            
            if (empty($old_pwd)) {
                header ("Location: change_pwd.php?error=Old password required");
                exit();
            }
            else if (empty($new_pwd)) {
                header ("Location: change_pwd.php?error=New password required");
                exit();
            }
            else if ($new_pwd !== $confirm_pwd) {
                header ("Location: change_pwd.php?error=Comfirm password doesn't match");
                exit();
            }
            else{
                //hashing password
                $old_pwd = md5($old_pwd);
                $new_pwd = md5($new_pwd);
                $id = $_SESSION['id'];

                $sql = "SELECT pwd FROM admins WHERE id=$id AND pwd='$old_pwd'";
                $result = $mysqli->query($sql);

                if($result->num_rows === 1){
                        
                    $sql2 = "UPDATE admins SET pwd='$new_pwd' WHERE id='$id'";
                    $mysqli->query($sql2);
                    header("Location: change_pwd.php?success=Password successfully changed");
                    exit();
                }
                else {
                        header("Location: change_pwd.php?error=Incorrect password");
                        exit();
                    } 
            }   
            
        }else {
            
        }
    }
?> 