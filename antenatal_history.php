<?php 
    include 'user_regdb.php';
    if (isset($_SESSION['id']) && isset($_SESSION['uname'])){
    include "unavbar.php";
    include 'comfig.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset= "UTF-8">
<meta name="author" content="Matilda">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Hospital Management System</title>
<link rel= "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

<!-- <link rel="stylesheet" href="home.css"/> -->
</head>

<body>

<div class="container p-4">
    <?php
    if(isset($_GET['view'])){
        $id = $_GET['view'];
        $sql = "SELECT * FROM antenatal WHERE id='$id'";
        $sults = $mysqli ->query($sql);
        $row =$sults->fetch_assoc();
        
        $full_name = $row['full_name'];
        $age = $row['age'];
        $gender = $row['gender'];


    }
    ?>

<div class="container">
            <table class="table table-hover" style="overflow:auto">
                <thead class="table table-hover">
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Sex</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <tr>
                        <td><?php echo $row['full_name']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td class="btn-group btn-group-justified">
                            <a href="view_history.php?history=<?php echo $row["id"]; ?>" class="badge text-light bg-secondary">Previous History</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


        <div class="row text-center g-4">
<div class="col-md-2">
                    <div class=" text-center">
                        <h5 class="">Obstetric history</h5>
                        <a href="" class="btn btn-primary">add</a>
                    </div>
            </div>
            
            <div class="col-md-2">
                        <h5 class="">Medical history</h5>
                        <a href="?view=<?php echo $row["id"]; ?>" class="btn btn-primary">add</a>
                    
                
            </div>

            <div class="col-md-2">
                        <h5 class="">Examinations</h5>
                        <a href="" class="btn btn-primary">add</a>

                
            </div>
            <div class="col-md-2">
                        <h5 class="">HTC status</h5>
                        <a href="hiv_vol_testing.php" class="btn btn-primary">add</a>
    
            </div>
            <div class="col-md-3">
                        <h5 class="">TTV status</h5>
                        <a href="" class="btn btn-primary">add</a>

            </div>
        </div>
        </div>
    </div>
</body>
</html>

<?php 
    } else{
        header('Location: home.php');
        exit();
    }