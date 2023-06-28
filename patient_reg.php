<?php
include 'user_regdb.php';
if (isset($_SESSION['id']) && isset($_SESSION['uname'])){
  include "unavbar.php";
  include "comfig.php";
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset= "UTF-8">
<meta name="author" content="Edson Magombo">
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
    <br>
	<br>
	<br>
	<br>

    <div class="container-fluid  p-2">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <b><h2 class="text-center text-dark mt-2">
                        Patient Registration
                        </h2></b>
    
                        <?php if(isset($_SESSION['response'])){ ?>
                        <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center">
                            <button type="button" class="close" data-dismiss="alert">&times; </button>
                            <b><?= $_SESSION['response']; ?></b>
                        </div>
                        <?php } unset($_SESSION['response']); ?>
                        
                    </div>
            
                    <form action="patient_reg_action.php" class="" method="post" enctype="multipart/form-data">

                    <?php if (isset($_GET['error'])) {?>
                           <p class="error"><?php echo $_GET['error']; ?></p>
                           <?php } ?>
                           
                       <?php if (isset($_GET['success'])) {?>
                           <p class="success"><?php echo $_GET['success']; ?></p>
                           
                           <?php } ?>
                        <div class="form-group p-1">
                            <input type = "text" name="name" class="form-control" placeholder="    Full Name" required>
                        </div>
                        <div class="form-group p-1">
                            <label>Date of birth</label>
                            <input type = "date" name="date" class="form-control" placeholder=" Date of Birth" required>
                        </div>
                        <div class="form-group p-1">
                            <label for="female" >Female</label>
                            <input type="radio" id="Female" name="gender" value="Female" required>
                            <label for="male">Male</label>
                        <input type="radio" id="Male" name="gender" value="Male" required>
                        </div>
                        <div class="form-group p-1">
                        <input type ="text" name="address" class="form-control" placeholder="Contact Address " required>
                        </div>
                        <div class="form-group p-1">
                        <input type = "text" name="next_of_kin" class="form-control" placeholder=" Next of Kin" required>
                        </div>
                        <div class="form-group p-1">
                        <input type = "text" name="religion" class="form-control" placeholder="Religion" required>
                        </div>
                        <div class="form-group p-1">
                        <input type = "text" name="occupation" class="form-control" placeholder="Occupation" required>
                        
                        <div class="form-group p-1 text-center">
                        <input type="submit" name="add" class="btn btn-primary btn-block" value="Register">
                       </div>
               
               
                     </form>
            
                </div>
            </div>
        </div>
    </div>

           
</body>
 

</html>

<?php 
    }else {
        header("Location: home.php");
        exit();
    }
?> 