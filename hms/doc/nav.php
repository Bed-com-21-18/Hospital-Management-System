<?php
$activePage = basename($_SERVER['PHP_SELF'], ".php");
if(isset($_GET['page'])){
    $activePage = $_GET['page'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Doctor Dashboard</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

<!-- Navigation bar -->
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<!-- Logo -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Doctor Dashboard</a>
		</div>
		<!-- Links -->
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li class="<?= ($activePage == 'index') ? 'active' : '' ?>"><a href="index.php?page=index">Home</a></li>
				<li class="<?= ($activePage == 'prescription') ? 'active' : '' ?>"><a href="../hms/prescribe.html?page=prescription">Prescription</a></li>
				 <li class="<?= ($activePage == 'appointments') ? 'active' : '' ?>"><a href="index.php?page=appointments">Appointments</a></li>
			</ul>
		</div>
	</div>
</nav>

<!-- Content -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
			<!-- Side navigation menu -->
			<div class="list-group">
				<a href="#" class="list-group-item <?= ($activePage == 'prescription') ? 'active' : '' ?>" onclick="loadData('prescription')">
					<i class="fas fa-notes-medical"></i> Prescription
				</a>
				<a href="#" class="list-group-item <?= ($activePage == 'appointments') ? 'active' : '' ?>" onclick="loadData('appointments')">
					<i class="far fa-calendar-alt"></i> Appointments
				</a>
			</div>
		</div>
		<div class="col-md-10">
			<!-- Main content goes here -->
			<div id="content">
	
				
                    </div>
                    </div>
                    </div>
                    
                    </div>
                    <!-- jQuery -->
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                    <!-- Bootstrap JavaScript -->
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
                    <script>
                        // Function to load content into the main content area
                        function loadData(page) {
                            $('#content').load('ajax/' + page + '.php');
                        }
                    </script>
                    </body>
                    </html>