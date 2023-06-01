<?php 
  session_start();
 include 'unavbar.php'; ?> 

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset= "UTF-8">
<meta name="author" content="Matilda Isaac">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Hospital Management System</title>
</div>
<!-- Latest compiled and manifest CSS -->
<link rel= "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<!-- jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <!-- Popper JS -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
 <!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

</head>

<body>
  
<div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">H M S</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
  <div class="list-group">
  <a href="home.php" class="list-group-item list-group-item-action ">
    Home
  </a>
  <a href="book_app_success.php" class="list-group-item list-group-item-action">Appointments</a>
  <a href="consulting.php" class="list-group-item list-group-item-action">Consultant</a>

  <a href="nurse_dashboard.php" class="list-group-item list-group-item-action">Departments</a>
  <a href="doctor.php" class="list-group-item list-group-item-action">Doctors</a>
  <a href="finance_status.php" class="list-group-item list-group-item-action">Finance</a>
  <a href="pharmacy.php" class="list-group-item list-group-item-action">Pharmacy</a>
  <a href="patient_list_user.php" class="list-group-item list-group-item-action disabled">Patients</a>
</div>
  </div>
</div>
  
</body>