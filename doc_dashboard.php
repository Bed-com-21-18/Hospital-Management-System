<?php 
       include "doctor_regdb.php";
       include "comfig.php";
    if (isset($_SESSION['id']) && isset($_SESSION['uname'])){

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hospital Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap-5.0.0/css/bootstrap.min.css"/>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
  <body>
      <!--NavBar-->
      <div class="container-fluid mb-5"> <?php include 'dnavbar.php'; ?></div>


    <!-- side bar -->
    <br>
    <br>
    <br>
    
    <!--Cards-->
    <section class="modules p-5 "style="margin-top:100px;"> 
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-md-4">
                    <div class="card text-dark">
                    
                        <div class="card-body text-center">
                        <div class="h1 mb-3">
                                <img src="img/doctor.png" alt="Outpatient" class="icon-image">
                            </div>
                            <h3 class="card-title mb-3 text-primary">Appointments</h3>
                            <a href="view_appointment.php" class="btn btn-primary">Proceed</a>               
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
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
            <div class="col-md-4">
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

                <div class="col-md-4">
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
    </div>
        </div>
        <br>
        <br><br><br><br>
    </section>

    </div>
  <?php
  include 'footer.php';
  ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <style>
            .icon-image {
                width: 60px;
                height: 60px;
                object-fit: contain;
            }
        </style>
  </body>
</html>

<?php 
    }else {
        header("Location: home.php");
        exit();
    }
?> 
