<?php
include 'user_regdb.php';
if (isset($_SESSION['id']) && isset($_SESSION['uname'])) {
    include "unavbar.php";
    include "comfig.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Drug Added Successfully</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3">

            <br> <br>
                <!-- Display success message -->
                <div class="alert alert-success" role="alert">
                    New drug has been added successfully!
                </div>
                <!-- Create buttons to go back and go to dashboard -->
                <div class="text-center">
                    <a href="pharmacy.php" class="btn btn-primary">Go to Pharmacy</a>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php 
    } else {
        header("Location: home.php");
        exit();
    }
?>  
  
