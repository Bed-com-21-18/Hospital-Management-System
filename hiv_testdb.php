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
        $id = $_POST['id'];
        $treatment = $_POST['treatment'];
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

        $user_data = 'weight='. $weight .'&id=' .$id .'&patient_name=' .$patient_name .'&treatment=' .$treatment; 

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
                 $sql6 = "UPDATE hiv_test_results SET treatment='$treatment' WHERE id='$id'";
                 $result6 = $mysqli->query($sql6);

                $sql3 = "INSERT INTO hiv_treatment(weight, drug, dates, next_treat, patient_name) 
                VALUES('$weight', '$drug', '$dates', '$next_treat', '$patient_name')";
                 if ($mysqli->query($sql3) === TRUE){
                    echo "<script>alert('Successfully Submitted');
                    window.location.href = 'hiv_patients.php';
                    </script>";
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
        $id = $_POST['id'];
        $patient_name = $_POST['patient_name'];
        $statu = $_POST['statu'];
        
        $sql3 = "UPDATE hiv_test SET statu='$statu', date='$dates' WHERE id='$id'";
        $result3 = $mysqli->query($sql3);
    
       $sql = "INSERT INTO hiv_test_results(statu, dates, patient_name) 
       VALUES('$statu', '$dates', '$patient_name')";
    
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
        $descriptions = $_POST['descriptions'];
        $patient_id = $_POST['patient_id'];
        $patient_name = $_POST['patient_name'];
        $gender = $_POST['gender'];
        $residential = $_POST['residential'];

        //validation
        function validate($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $weight = validate($_POST['descriptions']);

        $user_data = 'descriptions='. $descriptions .'&patient_id=' .$patient_id .'&patient_name=' 
        .$patient_name .'&gender=' .$gender .'&residential=' .$residential; 

        if (empty($descriptions)) {
            header ("Location: hiv_test_request.php?error=Include reasons for testing&$user_data");
            exit();
        }
        else {
            //add to database
                $sql1 = "INSERT INTO hiv_test(descriptions, patient_id, patient_name, gender, location) 
                VALUES('$descriptions', '$patient_id', '$patient_name', '$gender', '$residential')";
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

    // Voluntary testing
    if (isset($_POST['volu_testing'])){
        $patient_name = $_POST['patient_name'];
        $location = $_POST['location'];
        $gender = $_POST['gender'];
        $descriptions = $_POST['descriptions'];

        //validation
        function validate($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $patient_name = validate($_POST['patient_name']);
        $location = validate($_POST['location']);
        $gender = validate($_POST['gender']);
        $descriptions = validate($_POST['descriptions']);

        $user_data = 'patient_name='. $patient_name .'&location=' .$location .'&gender=' .$gender .'&descriptions=' .$descriptions; 

        if (empty($patient_name)) {
            header ("Location: hiv_vol_testing.php?error=name is required&$user_data");
            exit();
        }
        elseif (empty($location )) {
            header ("Location: hiv_vol_testing.php?error=Location is required&$user_data");
            exit();
        }
        elseif (empty($gender)) {
            header ("Location: hiv_vol_testing.php?error=Gender are required&$user_data");
            exit();
        }
        else {
            //add to database
                $sql4 = "INSERT INTO hiv_test (patient_name, location, gender, descriptions) 
                VALUES('$patient_name', '$location', '$gender', '$descriptions')";
                 if ($mysqli->query($sql4) === TRUE){
                    echo "<script>alert('Successfully Done');
                    window.location.href = 'hiv_test.php';
                    </script>";
                 }else{
                    echo "Error: " . $sql . "<br>" . $mysqli->error;
                    header ("Location:hiv_vol_testing.php?error=unknown error&$user_data");
                    exit();
                 }
           }
        
    }else{
        
    }


?>