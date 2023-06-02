<?php

include 'users_logindb.php';
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
        <link rel="stylesheet" href="home.css"/>
    </head>
    <body>

     <!-- Navbar -->
     <?php
            include "navbar2.php";
        ?>
        
         <!--Form-->
        <div class="row justify-content-center p-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center text-secondary">LOGIN</h4>
                    </div>
                    <div class="card-body">
                        <form action="users_logindb.php" method="POST">

                             <?php if (isset($_GET['error'])) {?>
                                <p class="error"><?php echo $_GET['error']; ?></p>
                                <?php } ?>

                            <div class="form-group mb-3">
                                <label>Username</label>
                                <input type="text" name="uname" class="form-control"/>
                            </div>
                            <div class="form-group mb-3">
                                <label>Password</label>
                                <input type="password" name="pwd" class="form-control"/>
                            </div>
                             
                         
                            <div class="form-group mb-3 text-center p-2">
                                <button type="submit" name="login" class="btn btn-primary">Login</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
      </div>
       

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html> 