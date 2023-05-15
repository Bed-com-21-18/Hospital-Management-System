<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Finance</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- Responsive meta tag -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      
</head>
<body>
<?php
    include "unavbar.php";
?>
   <!--NavBar-->
   <nav class="navbar navbar-expand py-3" style="background-color:#F1F6F9;">
      <div class="container">
         <h3 class="navbar-brand">Finance</h3>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                  <a href="#view-bill" class="nav-link p-2" data-toggle="tab">View Bills</a>
               </li>
               
               <li class="nav-item dropdown">
                  <a href="#add-bill" class="nav-link p-2" data-toggle="tab">Add New Bill</a>
               </li>
               
            </ul>
         </div>
      </div>
   </nav>

   <!-- Tab Content -->
   <div class="container mt-4">
      <div class="tab-content">
         <div class="tab-pane fade" id="view-bill">
            <?php include "Bilings/bills.php"; ?>
         </div>
         <div class="tab-pane fade" id="bill-bill">
            <?php include "Bilings/add_new_bill.php"; ?>
         </div>
      </div>
   </div>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
