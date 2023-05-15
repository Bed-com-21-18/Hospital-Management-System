<?php
 session_start();
            include "unavbar.php";
        ?>
<!DOCTYPE html>
<html>
<head>
    <title>Lab Request Sent Successfully!</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3">
                <!-- Display success message -->
                <div class="alert alert-success" role="alert">
                    Lab Request Sent Successfully!
                </div>
                <!-- Create buttons to go back and go to dashboard -->
                <div class="text-center">
                    <a href="nurse_dashboard.php" class="btn btn-primary">Go to Dashboard</a>
                    <button class="btn btn-primary" onclick="history.back()">Go Back</button>
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
