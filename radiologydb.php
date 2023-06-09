<?php 
    include "comfig.php";

    $id = 0;
    $uploads = false;
    $comments = '';
    $photo = '';

    if (isset($_POST['rad_button'])){
        $scan = $_POST['scan'];
        $patient_id = $_POST['patient_id'];
        $patient_name = $_POST['patient_name'];
        $messages = $_POST['messages'];

        //validation
        function validate($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $scan = validate($_POST['scan']);
        $messages = validate($_POST['messages']);

        $user_data = 'scan='. $scan .'&patient_id=' .$patient_id .'&patient_name=' .$patient_name . '&messages=' .$messages; 

        if (empty($scan)) {
            header ("Location: radiology_page.php?error=Indicate the radiology type&$user_data");
            exit();
        }
        else if(empty($messages)) {
            header ("Location: radiology_page.php?error=Indicate the area to be scanned&$user_data");
            exit();
        }
        else {
            //add to database
                $sql1 = "INSERT INTO radiology (patient_id, patient_name, messages, scan) 
                VALUES('$patient_id', '$patient_name', '$messages', '$scan')";
                 if ($mysqli->query($sql1) === TRUE){
                    // header ("Location: radiology_page.php?success=Request for scanning has been sent");
                    // exit();
                    echo "<script>alert('Successfully Submitted');
                            window.location.href = 'patient_list_user.php';
                            </script>";
                 }else{
                    header ("Location: radiology_page.php?error=unknown error&$user_data");
                    exit();
                 }
           }
        
    }else{
        
    }

    if (isset($_POST['doc_button'])){
        $scan = $_POST['scan'];
        $messages = $_POST['messages'];
        $patient_id = $_POST['patient_id'];
        $patient_name = $_POST['patient_name'];

        //validation
        function validate($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $scan = validate($_POST['scan']);
        $messages = validate($_POST['messages']);

        $user_data = 'scan='. $scan. '&messages='. $messages .'&patient_id=' .$patient_id .'&patient_name=' .$patient_name; 

        if (empty($scan)) {
            header ("Location: radiology_page.php?error=Indicate the area to be scanned&$user_data");
            exit();
        }
        else if (empty($messages)) {
            header ("Location: radiology_page.php?error=Add description&$user_data");
            exit();
        }
        else {
            //add to database
                $sql1 = "INSERT INTO radiology(scan, messages, patient_id, patient_name) VALUES('$scan', '$messages', '$patient_id', '$patient_name')";
                 if ($mysqli->query($sql1) === TRUE){
                    // header ("Location: radiology_page.php?success=Request for scanning has been sent");
                    // exit();
                    echo "<script>alert('Successfully Submitted');
                            window.location.href = 'view_appointment.php';
                            </script>";
                 }else{
                    header ("Location: doc_radiology_page.php?error=unknown error&$user_data");
                    exit();
                 }
           }
        
    }else{
        
    }



    if (isset($_POST['add_rad'])) {
        $comments = $_POST['comments'];
        $dates = $_POST['dates'];
        $patient_id = $_POST['patient_id'];
        $patient_name = $_POST['patient_name'];
        $statu = $_POST['statu'];
        $request = $_POST['request'];
        $photo = $_FILES['photo']['name'];
        $upload = "uploads/" . $photo;
    
        // Fetch the lab price from the laboratory table based on the test name
        $sql = "SELECT price FROM laboratory WHERE test_name = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $request);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows === 0) {
            // Display an error message if the test name does not exist in the laboratory table
            header("Location: radiology_page.php?error=The radiology test does not exist in the laboratory.");
            exit();
        }
    
        // Fetch the associated price
        $row = $result->fetch_assoc();
        $rad_price = $row['price'];
    
        // Prepare the SQL query to update the patient table with the lab price and results
        $sql1 = "UPDATE patient SET rad_price = '$rad_price' WHERE id = '$patient_id'";
        $result1 = $mysqli->query($sql1);

    
        // Prepare the SQL query to update the radiology table with the status
          
        $sql3 = "UPDATE radiology SET statu='$statu' WHERE patient_id='$patient_id'";
        $result3 = $mysqli->query($sql3);
    
       $sql = "INSERT INTO add_radiology(photo, comments, dates, patient_id, patient_name) 
       VALUES('$upload', '$comments', '$dates', '$patient_id', '$patient_name')";
    
        move_uploaded_file($_FILES['photo']['tmp_name'], $upload);
    
         if ($mysqli->query($sql) === TRUE) {
            // header ("Location: radiology_work.php?success=Added succesfully");
            // exit();
            echo "<script>alert('Successfully Submitted');
            window.location.href = 'radiology.php';
            </script>";
         } else {
         //echo "Error: " . $sql . "<br>" . $mysqli->error;
            header ("Location: radiology_work.php?error=unknown error&$user_data");
            exit();
    
         }
        
    }
    
?>