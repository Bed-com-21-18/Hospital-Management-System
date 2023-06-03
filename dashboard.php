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
    
      <div class="container-fluid mb-5"> <?php include 'anavbar.php'; ?></div>


    <!-- side bar -->

             <!--Cards-->
    <section class="p-5"> 
        <div class="container">
            <div class="row text g-9">
                <div class="col-md-4">
                    <div class="card text-dark">
                    
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                            <img src="img/doctor.png" alt="Outpatient" class="icon-image">
                            </div>
                            <h3 class="card-title mb-3 text-secondary">Doctors</h3>
                            <p class="card-text">Register, view or delete doctor</p>
                                <a href="doctor_reg.php" class="btn btn-primary">Manage Doctors</a>                    
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-dark">
                    
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                            <img src="img/doctor.png" alt="Outpatient" class="icon-image">
                            </div>
                            <h3 class="card-title mb-3 text-secondary">Admins</h3>
                            <p class="card-text">Register, view or delete admin</p>
                            <a href="admin_reg.php" class="btn btn-primary">Manage Admins</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-dark">
                    
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                            <img src="img/doctor.png" alt="Outpatient" class="icon-image">
                            </div>
                            <h3 class="card-title mb-3 text-secondary">System User</h3>
                            <p class="card-text">Register, view or delete user</p>
                            <a href="user_reg.php" class="btn btn-primary">Manage users</a>
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
