<?php 
    include "comfig.php";

    $id = 0;
    $uploads = false;
    $comments = '';
    $photo = '';
// treatment
    if (isset($_POST['hiv_treat'])){
        $weight = $_POST['weight'];
        $height = $_POST['height'];
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
        $height = validate($_POST['height']);
        $drug = validate($_POST['drug']);
        $dates = validate($_POST['dates']);
        $next_treat = validate($_POST['next_treat']);

        $user_data = 'weight='. $weight .'&height=' .$height. '&id=' .$id .'&patient_name=' .$patient_name .'&treatment=' .$treatment; 

        if (empty($weight)) {
            header ("Location: hiv_treatment.php?error=Weight is required&$user_data");
            exit();
        }
        elseif (empty($height)) {
            header ("Location: hiv_treatment.php?error=Height is required&$user_data");
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

                $sql3 = "INSERT INTO hiv_treatment(weight, height, drug, dates, next_treat, patient_name) 
                VALUES('$weight', '$height', '$drug', '$dates', '$next_treat', '$patient_name')";
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
    if(isset($_POST['counsellor'])){
        $dates = $_POST['dates'];
        $id = $_POST['id'];
        $patient_name = $_POST['patient_name'];
        $statu = $_POST['statu'];
        
        $sql3 = "UPDATE counselling SET statu='$statu', dates='$dates' WHERE id='$id'";
        $result3 = $mysqli->query($sql3);
         if ($mysqli->query($sql3) === TRUE) {
            echo "<script>alert('Successfully done');
            window.location.href = 'consultant_list.php';
            </script>";
         } else {
         //echo "Error: " . $sql . "<br>" . $mysqli->error;
            header ("Location: consultant_result.php?error=unknown error&$user_data");
            exit();
    
         }
        }


    //  test request   
    if (isset($_POST['counsell'])){
        $counsel = $_POST['counsel'];
        $patient_id = $_POST['patient_id'];
        $patient_name = $_POST['patient_name'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];

        //validation
        function validate($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $counsel = validate($_POST['counsel']);

        $user_data = 'counsel='. $counsel .'&patient_id=' .$patient_id .'&patient_name=' 
        .$patient_name .'&gender=' .$gender .'&address=' .$address; 

        if (empty($counsel)) {
            header ("Location: consultant_request.php?error=Include counselling type&$user_data");
            exit();
        }
        else {
            //add to database
                $sql1 = "INSERT INTO counselling(patient_id, patient_name, gender, address, counsel) 
                VALUES('$patient_id', '$patient_name', '$gender', '$address', '$counsel')";
                 if ($mysqli->query($sql1) === TRUE){
                    echo "<script>alert('Successfully Submitted');
                            window.location.href = 'patient_list_user.php';
                            </script>";
                 }else{
                    header ("Location: consultant_request.php?error=unknown error&$user_data");
                    exit();
                 }
           }
        
    }else{
        
    }


?>