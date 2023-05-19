<?php 
    session_start();

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
    <link rel="stylesheet" href="home.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
  <body>
      <!--NavBar-->
    <?php include 'unavbar.php'; ?>


    <!-- side bar -->

             <!--Cards-->
     <section class=""> 
        <h4 class="bg-light p-2 text-center text-secondary">Modules</h4>
    <div class="container p-4">
        <div class="row text-center g-4">
            <div class="col-md-3">
                <div class="card text-dark flex-fill">
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                            <i class="bi bi-people-fill text-primary"></i>
                        </div>
                        <h4 class="card-title mb-3 text-primary">Patients registration</h4>
                        <a href="patient_reg.php" class="btn btn-primary">Proceed</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-dark flex-fill">
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                            <i class="bi bi-people-fill text-primary"></i>
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
                            <i class="bi bi-people text-primary"></i>
                        </div>
                        <h3 class="card-title mb-3 text-primary">Inpatients</h3>
                        <a href="" class="btn btn-primary">Proceed</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-dark flex-fill">
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                            <i class="bi bi-people text-primary"></i>
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
                            <i class="bi bi-people text-primary"></i>
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
                            <i class="bi bi-people text-primary"></i>
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
                            <i class="bi bi-people text-primary"></i>
                        </div>
                        <h3 class="card-title mb-3 text-primary">Consultant</h3>
                        <a href="consulting.php" class="btn btn-primary">Proceed</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-dark flex-fill">
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                            <i class="bi bi-people text-primary"></i>
                        </div>
                        <h3 class="card-title mb-3 text-primary">Radiology</h3>
                        <a href="radiology.php" class="btn btn-primary">Proceed</a>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</section>

  
    <!--Footer-->
    <?php 
        include 'footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>

<?php 
    }else {
        header("Location: home.php");
        exit();
    }
?> 
