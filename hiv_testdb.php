<?php 
    include "comfig.php";

    $id = 0;
    $uploads = false;
    $comments = '';
    $photo = '';
// treatment
    if (isset($_POST['hiv_treat'])){
        $weight = $_POST['weight'];
        $drug = $_POST['drug'];
        $dates = $_POST['dates'];
        $next_treat = $_POST['next_treat'];
        $patient_id = $_POST['patient_id'];
        $patient_name = $_POST['patient_name'];

        //validation
        function validate($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $weight = validate($_POST['weight']);
        $drug = validate($_POST['drug']);
        $dates = validate($_POST['dates']);
        $next_treat = validate($_POST['next_treat']);

        $user_data = 'weight='. $weight .'&patient_id=' .$patient_id .'&patient_name=' .$patient_name; 

        if (empty($weight)) {
            header ("Location: hiv_treatment.php?error=Weight is required&$user_data");
            exit();
        }
        elseif (empty($drug)) {
            header ("Location: hiv_treatment.php?error=Enter drug&$user_data");
            exit();
        }
        elseif (empty($dates)) {
            header ("Location: hiv_treatment.php?error=Date is required&$user_data");
            exit();
        }
        elseif (empty($next_treat)) {
            header ("Location: hiv_treatment.php?error=Date is required&$user_data");
            exit();
        }
        else {
            //add to database
                $sql3 = "INSERT INTO hiv_treatment(weight, drug, dates, next_treat, patient_id, patient_name) 
                VALUES('$weight', '$drug', '$dates', '$next_treat', '$patient_id', '$patient_name')";
                 if ($mysqli->query($sql3) === TRUE){
                    header ("Location: hiv_treatment.php?success=Added successfully");
                    exit();
                 }else{
                    header ("Location: hiv_treatment.php?error=unknown error&$user_data");
                    exit();
                 }
           }
        
    }else{
        
    }


// add testing 
    if(isset($_POST['hiv_testing'])){
        $dates = $_POST['dates'];
        $patient_id = $_POST['patient_id'];
        $patient_name = $_POST['patient_name'];
        $statu = $_POST['statu'];
        
        $sql3 = "UPDATE hiv_test SET statu='$statu' WHERE patient_id='$patient_id'";
        $result3 = $mysqli->query($sql3);
    
       $sql = "INSERT INTO hiv_test_results(statu, dates, patient_id, patient_name) 
       VALUES('$statu', '$dates', '$patient_id', '$patient_name')";
    
         if ($mysqli->query($sql) === TRUE) {
            echo "<script>alert('Successfully Submitted');
            window.location.href = 'hiv_test.php';
            </script>";
         } else {
         //echo "Error: " . $sql . "<br>" . $mysqli->error;
            header ("Location: hiv_testing.php?error=unknown error&$user_data");
            exit();
    
         }
        }


    //  test request   
    if (isset($_POST['hiv_test'])){
        $description = $_POST['description'];
        $patient_id = $_POST['patient_id'];
        $patient_name = $_POST['patient_name'];

        //validation
        function validate($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $weight = validate($_POST['description']);

        $user_data = 'description='. $description .'&patient_id=' .$patient_id .'&patient_name=' .$patient_name; 

        if (empty($description)) {
            header ("Location: hiv_test_request.php?error=Include reasons for testing&$user_data");
            exit();
        }
        else {
            //add to database
                $sql1 = "INSERT INTO hiv_test(description, patient_id, patient_name) 
                VALUES('$description', '$patient_id', '$patient_name')";
                 if ($mysqli->query($sql1) === TRUE){
                    echo "<script>alert('Successfully Submitted');
                            window.location.href = 'patient_list_user.php';
                            </script>";
                 }else{
                    header ("Location: hiv_test_request.php?error=unknown error&$user_data");
                    exit();
                 }
           }
        
    }else{
        
    }

?>