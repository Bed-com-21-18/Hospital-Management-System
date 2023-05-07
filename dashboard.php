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
    <?php include 'anavbar.php'; ?>


    <!-- side bar -->

             <!--Cards-->
    <section class="p-5 bg-secondary"> 
        <div class="container">
            <div class="row text-center g-4">
           
<<<<<<< HEAD
                
=======
                <div class="col-md">
                    <div class="card text-dark">
                    
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-graph-up text-primary"></i>
                            </div>
                            <h3 class="card-title mb-3 text-primary"></h3>
                            <h3 class="card-title mb-3 text-primary">Patient List</h3>
                            <p class="card-text">see the list of all patient in the system</p>
                             <a href="patient_list.php" class="btn btn-primary">Proceed</a>

                        </div>
                    </div>
                </div>


>>>>>>> 64f5a9756596132f5d03e431421906d1f95d7f28
                <div class="col-md">
                    <div class="card text-dark">
                    
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-graph-up text-primary"></i>
                            </div>
                            <h3 class="card-title mb-3 text-primary">Manage billing</h3>
<<<<<<< HEAD
                            <p class="card-text">something here.
                            </p>
                            <a href="Bilings/add_drugfee.php" class="btn btn-primary">Manage</a>
                        </div>
                    </div>
                </div>

                <div class="col-md">
                    <div class="card text-dark">
                    
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-graph-up text-primary"></i>
                            </div>
                            <h3 class="card-title mb-3 text-primary">Drugs</h3>
                            <p class="card-text">add drugs and presciption price.
                            </p>
                            <a href="Bilings/drugsprice.php" class="btn btn-primary">Add drugs</a>
                        </div>
                    </div>
                </div>

                <div class="col-md">
                    <div class="card text-dark">
                    
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-graph-up text-primary"></i>
                            </div>
                            <h3 class="card-title mb-3 text-primary">Patients</h3>
                            <p class="card-text">something here.
                            </p>
                            <a href="patient_list.php" class="btn btn-primary">Patient list</a>
=======
                            
                            <p class="card-text">View or delete bills</p>
                            <a href="dashboard.php" class="btn btn-primary">Manage</a>
>>>>>>> 64f5a9756596132f5d03e431421906d1f95d7f28
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card text-dark">
                    
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-people-fill text-primary"></i>
                            </div>
                            <h3 class="card-title mb-3 text-primary">Doctors</h3>
                            <p class="card-text">Register, view or delete doctor</p>
                                <a href="doctor_reg.php" class="btn btn-primary">Manage</a>                    
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card text-dark">
                    
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-people text-primary"></i>
                            </div>
                            <h3 class="card-title mb-3 text-primary">Admins</h3>
                            <p class="card-text">Register, view or delete admin</p>
                            <a href="admin_reg.php" class="btn btn-primary">manage</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card text-dark">
                    
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-people text-primary"></i>
                            </div>
                            <h3 class="card-title mb-3 text-primary">Other Users</h3>
                            <p class="card-text">Register, view or delete user</p>
                            <a href="user_reg.php" class="btn btn-primary">manage</a>
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
