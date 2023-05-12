<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hospital Management System</title>
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css"/>
        <link rel="stylesheet" href="bootstrap-5.0.0/css/bootstrap.min.css"/>
    </head>
    <body>
      
      <!--NavBar-->
        <nav class="navbar navbar-expand-lg py-3"style="background-color:#F1F6F9;" >
            <div class="container">
                         

                <div class="collapse navbar-collapse" id="navmenu">
                    <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                            <a href="home.php" class="nav-link bi bi-house-fill"> Home</a>
                        </li>
                    <br>
                    
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle bi bi-person-fill" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Login
                            </a>
                            <ul class="dropdown-menu text-center">
                                <li><a class="dropdown-item" href="admin_login.php">Admin</a></li>
                                <li><a class="dropdown-item" href="doctor_login.php">Doctor</a></li>
                                <li><a class="dropdown-item" href="user_login.php">System user</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>    