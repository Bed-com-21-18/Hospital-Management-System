<?php
include 'user_regdb.php';
if (isset($_SESSION['id']) && isset($_SESSION['uname'])){
  include "unavbar.php";
  include "comfig.php";
        ?>
<!DOCTYPE html>
<html>
<head>
	<title>Pharmacy</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- Responsive meta tag -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      
</head>
<body>

   <!--NavBar-->
   <nav class="navbar navbar-expand py-3" style="background-color:#F1F6F9;">
      <div class="container">
         <h3 class="navbar-brand">Pharmacy</h3>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                  <a href="#add-drug" class="nav-link p-2" data-toggle="tab">Add New Drug</a>
               </li>
               
               <li class="nav-item dropdown">
                  <a href="#add-drug" class="nav-link p-2" data-toggle="tab">Add New Drug</a>
               </li>
               
               <li class="nav-item dropdown">
                  <a href="#update-drug" class="nav-link p-2" data-toggle="tab">Update Drug</a>
               </li>
            </ul>
         </div>
      </div>
   </nav>

   <!-- Tab Content -->
   <div class="container mt-4">
      <div class="tab-content">
         <div class="tab-pane fade" id="add-drug">
            <?php include "Bilings/add_drug.php"; ?>
         </div>
         <div class="tab-pane fade" id="update-drug">
            <?php include "Bilings/update_drug.php"; ?>
         </div>
      </div>
   </div>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php 
    }else {
        header("Location: home.php");
        exit();
    }
?> 