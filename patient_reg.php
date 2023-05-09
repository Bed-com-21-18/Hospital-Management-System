
   
 <?php 
  session_start();
 include 'unavbar.php'; ?>   

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset= "UTF-8">
<meta name="author" content="Edson Magombo">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Hospital Management System</title>
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
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <b><h2 class="text-center text-dark mt-2">
                  Patient Registration 
                </h2></b>
                <hr>

                <?php if(isset($_SESSION['response'])){ ?>
                <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center">
                 <button type="button" class="close" data-dismiss="alert">&times; </button>
                 <b><?= $_SESSION['response']; ?></b>
                </div>
                 <?php } unset($_SESSION['response']); ?>
                 
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
            <h3 class="text-center text-info">Register New Patient</h3>
            <form action="patient_reg_action.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                <input type = "text" name="name" class="form-control" placeholder="Enter Full Name" required>
                </div>
                <div class="form-group">
                <input type = "date" name="date" class="form-control" placeholder="Enter DoB" required>
                <label for="male"><b>Gender:  </b></label>
                <label for="female">Female</label>
                <input type="radio" id="Female" name="gender" value="Female">

                <label for="male">Male</label>
                <input type="radio" id="Male" name="gender" value="Male">

                </div>
                <div class="form-group">
                <input type ="tel" name="phoneNumber" class="form-control" placeholder="Enter Phone Number" required>
                </div>
                <div class="form-group">
                <input type = "text" name="district" class="form-control" placeholder="Enter Home" required>
                </div>
                <div class="form-group">
                <input type = "text" name="village" class="form-control" placeholder="Enter Home Village" required>
                </div>

                <div class="form-group">
                <input type = "text" name="residential" class="form-control" placeholder="Enter Residential Address" required>
                </div>
                <input type="submit" name="add" class="btn btn-primary btn-block" value="Register">
            </form>
            </div>
            <div class="col-md-8">

                <?php 
              // Connect to the database
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "hms";
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }
                $query= "SELECT * FROM patient ORDER by id DESC";
                $stmt= $conn-> prepare($query);
                $stmt->execute();
                $result= $stmt ->get_result();
                ?>
            <h3 class="text-center text-info">Patients Records</h3>
             <p>Type first names, last names or emails to search:</p>  
                <input class="form-control" id="myInput" type="text" placeholder="Search..">
                <br>                  
                        
            <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Patient ID</th>
                        <th>Name</th>
                        <th>Date of Birth</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Phone No.</th>
                        <th>Home  Village</th>
                        <th>Residential</th>

                    </tr>
                    </thead>
                    <tbody id = "myTable">
                        <?php while ($row= $result->fetch_assoc()){ ?>

                        
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['name']; ?></td>
                        <td><?= $row['date']; ?></td>
                        <td><?= $row['age']; ?></td>
                        <td><?= $row['gender']; ?></td>
                        <td><?= $row['phoneNumber']; ?></td>
                        <td><?= $row['village']; ?></td>
                        <td><?= $row['residential']; ?></td>


                    </tr>
                        <?php } ?>
                    
                    
                    </tbody>
                </table>
            </div>
            
        </div>  
    </div>

                    <script>
                        $(document).ready(function(){
                        $("#myInput").on("keyup", function() {
                            var myInput = $(this).val().toLowerCase();
                            $("#myTable tr").filter(function() {
                            $(this).toggle($(this).text().toLowerCase().indexOf(myInput) > -1)
                            });
                        });
                        });
                        </script>
</body>
<?php 
 include 'footer.php'; ?>   

</html>