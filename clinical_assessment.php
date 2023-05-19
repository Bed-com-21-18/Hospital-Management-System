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
      
      <!--NavBar-->
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3">
            <div class="container">
            <div class="position-absolute center-0 start-0">
            <a href="menu.php" class="bi bi-justify  text-white fs-2"></a>
                </div>
                <h5 class="navbar-brand"><i>HOSPITAL MANAGEMENT SYSTEM</i></h5>
                <button 
                class="navbar-toggler" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navmenu">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="doc_dashboard.php" class="nav-link"> Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="nurse_dashboard.php" class="nav-link"> Modules</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle bi bi-person-fill" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION['uname']; ?></a>
                            </a>
                            <ul class="dropdown-menu text-center">
                                <li><a class="dropdown-item bg-success" href="dchange_pwd.php">Change password</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item bg-danger" href="home.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <br/>
        <section class="p-1">
            <div>
            <button class="bg-info">Edit</button>
            <button class="bg-">Discard</button>
            <button class="bg-info text-right">Done</button>
           <button class="bg-info text-right"> <a  href="consulting.php">Back</a></button>

            </div>
            <br/>

        <h4 class="bg-light p-2 text-center text-secondary"> Clinical assessment</h4>
        </section>
    <form class="p-4 row form-control">
        <div class="row  g-col-6">
            <ul>
           <p><a class="link-offset-2 link-underline link-underline-opacity-0" href="view_appointment.php">Appointment</a>
           <a class="link-offset-2 link-underline link-underline-opacity-0" href="">Clinical assessment</a>
           <a class="link-offset-2 link-underline link-underline-opacity-0" href="investigation.php">Investigation</a></p>
            </ul>
        </div>

        <div class="row g-3 align-items-center">
        <h5>General examination</h5>
  <div class="col-auto">
    <label for="inputPassword6" class="col-form-label">Weight</label>
  </div>
  <div class="col-auto">
    <input type="password" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline">
  </div>
  <div class="col-auto">
    <label id="passwordHelpInline" class="form-text">
      RR
    </label>
  </div>
  <div class="col-auto">
    <input type="password" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline">
  </div>
</div>

  <div class="row g-3 align-items-center">
  <div class="col-auto">
    <label for="inputPassword6" class="col-form-label">Temp</label>
  </div>
  <div class="col-auto">
    <input type="password" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline">
  </div>
  <div class="col-auto">
    <span id="passwordHelpInline" class="form-text">
      BP
    </span>
  </div>
  <div class="col-auto">
    <input type="password" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline">
  </div>
</div>

  <div class="row g-3 align-items-center">
  <div class="col-auto">
    <label for="inputPassword6" class="col-form-label">Heart Rate</label>
  </div>
  <div class="col-auto">
    <input type="password" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline">
  </div>
  <div class="col-auto">
    <span id="passwordHelpInline" class="form-text">
      SP02
    </span>
  </div>
  <div class="col-auto">
    <input type="password" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline">
  </div>
</div>

 
    </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>    

<?php 
    }else {
        header("Location: home.php");
        exit();
    }
?> 
