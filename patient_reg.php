
   
 <?php 
  session_start();
 include 'unavbar.php'; ?>   

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset= "UTF-8">
<meta name="author" content="Edson Magombo">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Hospital Management System</title>
<!-- Latest compiled and manifest CSS -->
<link rel= "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<!-- jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <!-- Popper JS -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
 <!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container-fluid  bg-light">
        <div class="row justify-content-center">
            <div class="col-md-10">
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
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
            <form action="patient_reg_action.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                <input type = "text" name="name" class="form-control" placeholder="Enter Full Name" required>
                </div>
                <div class="form-group">
                <label for="female" >Fill Date of Birth</label>
                <input type = "date" name="date" class="form-control" placeholder="Enter DoB" required>
                <label for="female" >Female</label>
                <input type="radio" id="Female" name="gender" value="Female" required>

                <label for="male">Male</label>
                <input type="radio" id="Male" name="gender" value="Male" required>

                </div>
                <div class="form-group">
                <input type ="tel" name="phoneNumber" class="form-control" placeholder="Enter Phone Number" required>
                </div>
                <div class="form-group">
                <input type = "text" name="district" class="form-control" placeholder="Enter Home" required>
                </div>
                <div class="form-group">
                <input type = "text" name="village" class="form-control" placeholder="Enter Home Village" required>
                </div>

                <div class="form-group">
                <input type = "text" name="residential" class="form-control" placeholder="Enter Residential Address" required>
                </div>
                <input type="submit" name="add" class="btn btn-primary btn-block" value="Register">
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>

               
            </form>
            


           
</body>
 

</html>