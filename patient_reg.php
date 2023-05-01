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
        <link rel="stylesheet" href="style.css"/>
        <link rel="stylesheet" href="bootstrap-5.0.0/css/bootstrap.min.css"/>
    </head>
    <body>

    <!-- Navbar -->
        <?php
            include "unavbar.php";
        ?>
        
         <!--Form-->
        <div class="row justify-content-center p-5 bg-light">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">PATIENT REGISTRATION</h4>
                    </div>
                    <div class="card-body">
                        <form action="logindb.php" method="POST">
                        <div class="form-group mb-3">
                            <label>Full name</label>
                            <input type="text" name="name" class="form-control" required/>
                        </div>
                        <div class="form-group mb-3">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" required/>
                        </div>
                        <div class="form-group mb-3">
                            <label>Location</label>
                            <input type="text" name="location" class="form-control" required/>
                        </div>
                        <div class="form-group mb-3">
                            <label>Date</label>
                            <input type="date" name="dates" class="form-control" required/>
                        </div>
                        <div class="form-group p-2"> 
                            <label class="px-2">Gender</label> <br/>
                            <input name="male" type="radio"/>
                            <label>Male</label>
                            <input name="female" type="radio"/>
                            <label>Female</label>
                        </div>
                        <div class="form-group mb-3 text-center">
                            <button type="submit" name="login" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
      </div>


        <!-- footer -->
        <?php
            include "footer.php";
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html> 
<?php 
    }else {
        header("Location: home_login.php");
        exit();
    }
?> 