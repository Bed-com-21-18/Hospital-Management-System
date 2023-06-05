<?php
include 'user_regdb.php';
if (isset($_SESSION['id']) && isset($_SESSION['uname'])){
  include "unavbar.php";
  include "comfig.php";
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

   <!--Cards-->
   <section class="p-5 bg-secondary"> 
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-md">
                    <div class="card text-dark">
                    
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-people-fill text-primary"></i>
                            </div>
                            <h3 class="card-title mb-3 text-primary">Bill Laboratory</h3>
                            <a href="laboratorytest_form.php" class="btn btn-primary">Proceed</a>               
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md">
                    <div class="card text-dark">
                    
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-person-fill text-primary">Bill Radiology</i>
                            </div>
                            <h3 class="card-title mb-3 text-primary"></h3>
                            <a href="" class="btn btn-primary">Proceed</a>                    
                        </div>
                    </div>
                </div> -->
                <div class="col-md">
                    <div class="card text-dark">
                    
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-people text-primary"></i>
                            </div>
                            <h3 class="card-title mb-3 text-primary">Bill Radiology</h3>
                            <a href="radiology_set_price.php" class="btn btn-primary">Proceed</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <br>
        <br><br><br><br>
    </section>

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