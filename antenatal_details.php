<?php 
    include 'user_regdb.php';
    if (isset($_SESSION['id']) && isset($_SESSION['uname'])){
    include 'antenatal.php';
    include "unavbar.php";
    include 'comfig.php';
    
    if(isset($_POST['Register'])){
    $full_name =$_POST['full_name'];
    $facility_name =$_POST['facility_name'];
    $id=$_POST['id'];
    $age=$_POST['age'];
    $gender = "female";
    $last_menstrual_period=$_POST['last_menstrual_period'];
    $expected_date_of_delivery=$_POST['expected_date_of_delivery'];
    $visit_no=$_POST['visit_no'];
    $visit_date=$_POST['visit_date'];
    $next_visit_date=$_POST['next_visit_date'];


    $sql ="insert into `antenatal`(full_name,facility_name,id,age,gender,last_menstrual_period,expected_date_of_delivery,visit_no,visit_date,next_visit_date) 
    values ('$full_name','$facility_name','$id','$age','$gender','$last_menstrual_period','$expected_date_of_delivery','$visit_no','$visit_date','$next_visit_date')";
    $sults= mysqli_query($conn,$sql);
    if($sults){
        // echo "Data inserted successifully";
        header('location:antenatal_display.php');
    }else{
        die(mysqli_error($conn));
    }
    }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset= "UTF-8">
<meta name="author" content="Matilda">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Hospital Management System</title>
<link rel= "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="home.css"/>
</head>

<body>
    <div class="container-fluid  p-2">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <b><h2 class="text-center text-dark mt-2">
                        Antenatal Registration
                        </h2></b>
    
                        <?php if(isset($_SESSION['response'])){ ?>
                        <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center">
                            <button type="button" class="close" data-dismiss="alert">&times; </button>
                            <b><?= $_SESSION['response']; ?></b>
                        </div>
                        <?php } unset($_SESSION['response']); ?>
                        
                    </div>
            
                    <form action="antenatal_details.php" class="" method="post" enctype="multipart/form-data">

                    <?php if (isset($_GET['error'])) {?>
                           <p class="error"><?php echo $_GET['error']; ?></p>
                           <?php } ?>
                           
                       <?php if (isset($_GET['success'])) {?>
                           <p class="success"><?php echo $_GET['success']; ?></p>
                           <?php } ?>
                        <div class="form-group p-1">
                        <label>Full name</label>

                            <input type = "text" name="full_name" class="form-control" placeholder="Enter Full Name" required>
                        </div>
                        <div class="form-group p-1">
                            <label>Facility name</label>
                            <input type = "text" name="facility_name" class="form-control" placeholder="Enter facility name" required>
                        </div>
        
                        
                        <!-- <div class="form-group p-1">
                        <label>Id</label>
                        <input type ="id" name="id" class="form-control" placeholder="Enter id" required>
                        </div> -->

                        <div class="form-group p-1">
                        <label> Age</label>
                        <input type = "number" name="age" class="form-control" placeholder="Enter age" required>
                        </div>

                        <div class="form-group p-1">
                        <label>Last menstrual period</label>
                        <input type = "date" name="last_menstrual_period" class="form-control" placeholder="Enter LMP" required>
                        </div>

                        <div class="form-group p-1">
                        <label>Expected Date of delivery</label>
                        <input type = "date" name="expected_date_of_delivery" class="form-control" placeholder="Enter date" required>
                        </div>

                        <div class="form-group p-1">
                        <label>Visit No.</label>
                        <input type = "number" name="visit_no" class="form-control" placeholder="Enter visit number" required>
                       </div>
                       
                       <div class="form-group p-1">
                        <label>Visit Date</label>
                        <input type = "date" name="visit_date" class="form-control" placeholder="Enter visit date" required>
                        </div>

                        <div class="form-group p-1">
                        <label> Next Visit Date</label>
                        <input type = "date" name="next_visit_date" class="form-control" placeholder="Enter next visit date" required>
                        </div>
                        <div class="form-group p-1 text-center">
                        <input type="submit" name="Register" class="btn btn-primary btn-block" value="Register">
                       </div>
               
               
                     </form>
            
                </div>
            </div>
        </div>
    </div>

           
</body>
 

</html>

<?php 
    } else{
        header('Location: home.php');
        exit();
    }
                       
