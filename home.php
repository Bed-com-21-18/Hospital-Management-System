
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hospital Management System</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css"/>
        <link rel="stylesheet" href="bootstrap-5.0.0/css/bootstrap.min.css"/>
    </head>
    <body>

    <!-- Navbar -->
        <?php
            include "navbar2.php";
        ?>

      <!-- home page -->
          <!--ShowCase-->
        <section class="">
            <div class="showcase">
                <div  class="p-4 text-light text-center">
                    <h1>
                        <span class="text-warning"><i>Welcome to</i></span> HOSPITAL MANAGEMENT SYSTEM</span> 
                    </h1>
                    <hr>
                    <p class="my-4">
                        This is a system that stores patients information for easy...

                    </p>
                </div>
                <div class="container pt-4">
                    <div class="row text-center g-4">
                        <div class="col-md">
                            <a href="doctor_login.php"><button class="btn btn-primary">Doctors Login</button></a>
                        </div>
                        <div class="col-md">
                            <a href="user_login.php"><button class="btn btn-primary">Nurses Login</button></a>
                        </div>
                        <div class="col-md">
                            <a href="admin_login.php"><button  class="btn btn-primary">Admins Login</button></a>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <!-- footer -->
        <?php
            include "footer.php";
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>   
