<!DOCTYPE html>
<html>
<head>
	<title>View Lab Requests</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- Responsive meta tag -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            });
        </script>
</head>
<body>
<?php 
session_start();
include "comfig.php";
include "unavbar.php";
?>
   <!--NavBar-->
   <nav class="navbar navbar-expand py-3"style="background-color:#F1F6F9;" >
            <div class="container">
			<h5 class="navbar-brand"> Laboratory Request for Test</h5>
                <button 
                class="navbar-toggler" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
                </button>     

                <div class="collapse navbar-collapse" id="navmenu">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                                <!-- search -->
                        <input class="form-control me-1" id="myInput" style="width:100%; max-width:20rem" type="text" placeholder="Search" aria-label="Search">             
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
<?php
$sql2 = "SELECT * FROM patient WHERE tests IS NOT NULL ORDER BY id DESC";
$result2 = $mysqli->query($sql2);

// Display patient information in table rows
if ($result2->num_rows > 0) {
    ?>
    <div class="container">
    <div class="table-responsive">
        <table class="table table-bordered  bg-secondary text-light">
            <thead class="thead-light">
                <tr>
                    <th>Name</th>
                    <th>Date of Birth</th>
                    <th>Age</th>
                    <th>Sex</th>
                    <th>Test(s) requested</th>
                    <th>Test Results</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id = "myTable">
                <?php
                while ($row = $result2->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["date"]; ?></td>
                        <td><?php echo $row["age"]; ?></td>
                        <td><?php echo $row["gender"]; ?></td>
                        <td><?php echo $row["tests"]; ?></td>
                        <td><?php echo $row["lab_results"]; ?></td>
                        <td class='btn-group btn-group-justified'>                                    
									<a href='lab_form.php?respond=<?php echo $row["id"]; ?>' class='badge bg-success'>Proceed</a>
							</td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <br>             
        <button class='btn btn-primary mb-3' onclick='window.history.back()'> Go Back</button>
    </div>
</div>
<?php

} else {
    echo "<div class='container'><div class='table-responsive'><table class='table table-bordered bg-secondary text-light'>";
    echo "<thead class='thead-light'><tr><th colspan='15' class='text-center'>No test request found!</th></tr></thead>";
    echo "</table></div></div>";
    }
    ?>
    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html