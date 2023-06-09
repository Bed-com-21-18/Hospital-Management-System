<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hospital Management System</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="home.css"/>
    </head>
    <body style="background-color:#9BA4B5;">
        <section>
           <!-- Navbar -->
           <?php include "navbar2.php"; ?>
           <div class="showcase">
             <div class="p-4 text-light text-center">
               <h1>HMS</h1>
               <h1>HOSPITAL MANAGEMENT SYSTEM</h1>
               <hr>
               <p class="my-4">This is a system that stores patients' records, performs billing...</p>
             </div>
             <div class="container-fluid pt-4">
               <div class="row text-center g-4">
                 <div class="col-md">
                   <div class="dropdown">
                     <button class="btn dropdown-toggle" type="button" id="loginDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="background-color:#EEEEEE;">
                       Login
                     </button>
                     <ul class="dropdown-menu" aria-labelledby="loginDropdown">
                       <li><a class="dropdown-item" href="doctor_login.php">Doctor</a></li>
                       <li><a class="dropdown-item" href="user_login.php">System User</a></li>
                       <li><a class="dropdown-item" href="admin_login.php">Admin</a></li>
                     </ul>
                   </div>
                 </div>
               </div>
             </div>
           </div>
        </section>

        <!-- footer -->
        <?php include "footer.php"; ?>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>
