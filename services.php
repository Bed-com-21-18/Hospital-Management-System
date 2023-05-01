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
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
  <body>
      <!--NavBar-->
    <?php include 'unavbar.php'; ?>


    <!-- side bar -->

             <!--Cards-->
    <section class="p-5 bg-secondary"> 
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-md">
                    <div class="card text-dark">
                    
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-person-fill text-primary"></i>
                            </div>
                            <h3 class="card-title mb-3 text-primary">Register patient</h3>
                            <a href="patient_reg.php" class="btn btn-primary">proceed</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card text-dark">
                    
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-people-fill text-primary"></i>
                            </div>
                            <h3 class="card-title mb-3 text-primary">Register patient</h3>
                            <a href="patient_reg.php" class="btn btn-primary">proceed</a>                   
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card text-dark">
                    
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-people text-primary"></i>
                            </div>
                            <h3 class="card-title mb-3 text-primary">Register patient</h3>
                            <a href="patient_reg.php" class="btn btn-primary">proceed</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card text-dark">
                    
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-people text-primary"></i>
                            </div>
                            <h3 class="card-title mb-3 text-primary">Register patient</h3>
                            <a href="patient_reg.php" class="btn btn-primary">proceed</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    </div>
  
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
