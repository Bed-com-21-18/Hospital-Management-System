<?php 
    session_start();

    if (isset($_SESSION['id']) && isset($_SESSION['uname'])){

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
 <style>
        .icon-image {
            width: 60px;
            height: 60px;
            object-fit: contain;
        }
</style>
</head>

<body>
    <!--NavBar-->
    <?php include 'unavbar.php'; ?>
    
    <div class="container-fluid  p-2">
        <div class="row justify-content-center">
            
             <section class=""> 
                <div class="container p-4">
                    <div class="row text-center g-4">
                    <div class="col-md-3 ">
                        <div class="card text-dark flex-fill">
                            <div class="card-body text-center">
                                <div class="h1 mb-3">
                                    <img src="img/crowd.png" alt="Outpatient" class="icon-image">
                                </div>
                                <h3 class="card-title mb-3 text-primary">Registration</h3>
                                <a href="reg_list.php" class="btn btn-primary">Proceed</a>
                            </div>
                        </div>
                    </div>
                   
                        <div class="col-md-3">
                            <div class="card text-dark flex-fill">
                                <div class="card-body text-center">
                                <div class="h1 mb-3">
                                    <img src="img/advice.png" alt="Outpatient" class="icon-image">
                                </div>
                                    <h3 class="card-title mb-3 text-primary">Outpatient</h3>
                                    <a href="patient_list_user.php" class="btn btn-primary">Proceed</a>                   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-dark flex-fill">
                                <div class="card-body text-center">
                                <div class="h1 mb-3">
                                    <img src="img/doctor1.png" alt="Outpatient" class="icon-image">
                                </div>
                                    <h3 class="card-title mb-3 text-primary">Inpatients</h3>
                                    <a href="inpatient.php" class="btn btn-primary">Proceed</a>
                                </div>
                            </div>
                        </div>
            
                        <div class="col-md-3">
                            <div class="card text-dark flex-fill">
                                <div class="card-body text-center">
                                <div class="h1 mb-3">
                                    <img src="img/laboratory.png" alt="Outpatient" class="icon-image">
                                </div>
                                    <h3 class="card-title mb-3 text-primary">Laboratory</h3>
                                    <a href="laboratory.php" class="btn btn-primary">Proceed</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-dark flex-fill">
                                <div class="card-body text-center">
                                <div class="h1 mb-3">
                                    <img src="img/pharmacy.png" alt="Outpatient" class="icon-image">
                                </div>
                                    <h3 class="card-title mb-3 text-primary">Pharmacy</h3>
                                    <a href="pharmacy.php" class="btn btn-primary">Proceed</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-dark flex-fill">
                                <div class="card-body text-center">
                                <div class="h1 mb-3">
                                    <img src="img/accounting.png" alt="Outpatient" class="icon-image">
                                </div>
                                    <h3 class="card-title mb-3 text-primary">Finance</h3>
                                    <a href="finance.php" class="btn btn-primary">Proceed</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-dark flex-fill">
                                <div class="card-body text-center">
                                <div class="h1 mb-3">
                                    <img src="img/consultation.png" alt="Outpatient" class="icon-image">
                                </div>
                                    <h3 class="card-title mb-3 text-primary">Conselling</h3>
                                    <a href="consultant_list.php" class="btn btn-primary">Proceed</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-dark flex-fill">
                                <div class="card-body text-center">
                                <div class="h1 mb-3">
                                    <img src="img/x-ray.png" alt="Outpatient" class="icon-image">
                                </div>
                                    <h3 class="card-title mb-3 text-primary">Radiology</h3>
                                    <a href="radiology.php" class="btn btn-primary">Proceed</a>
                                </div>
                            </div>
                        </div>
            
                        <div class="col-md-3">
                            <div class="card text-dark flex-fill">
                                <div class="card-body text-center">
                                    <div class="h1 mb-3">
                                        <img src="img/blood-test.png" alt="Outpatient" class="icon-image">
                                    </div>
                                    <h3 class="card-title mb-3 text-primary">HIV/AIDS</h3>
                                    <a href="hiv_test.php" class="btn btn-primary">Proceed</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                <div class="card text-dark flex-fill">
                    <div class="card-body text-center">
                    <div class="h1 mb-3">
                                    <img src="img/pregnant.png" alt="Outpatient" class="icon-image">
                                </div>
                      
                        <h3 class="card-title mb-3 text-primary">Antenatal Care</h3>
                        <a href="antenatal_display.php" class="btn btn-primary">Proceed</a>
                    </div>
                </div>
            </div>
           
            <div class="col-md-3">
                <div class="card text-dark flex-fill">
                    <div class="card-body text-center">
                    <div class="h1 mb-3">
                                    <img src="img/cancer.png" alt="Outpatient" class="icon-image">
                                </div>
    
                        <h3 class="card-title mb-3 text-primary">Cervical Cancer</h3>
                        <a href="" class="btn btn-primary">Proceed</a>
                    </div>
                </div>
            </div>
           
                    </div>
                </div>
            </section>
        </div>
    </div>

           
</body>
 

</html>

<?php 
    }else {
        header("Location: home.php");
        exit();
    }
