<?php 
    include 'user_regdb.php';
    if (isset($_SESSION['id']) && isset($_SESSION['uname'])){
    include 'antenatal.php';
    include "unavbar.php";
    include 'comfig.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset= "UTF-8">
<meta name="author" content="Edson Magombo">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Hospital Management System</title>
<link rel= "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<!-- <link rel="stylesheet" href="home.css"/> -->
</head>
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

<body>
   <!--NavBar-->
   <nav class="navbar navbar-expand py-1"style="background-color:#F1F6F9;" >
            <div class="container">
			<h5 class="navbar-brand"> Antenatal List</h5>
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
                        </li> &nbsp;
                        <a class ="btn btn-secondary" href="antenatal_details.php">Add New</a>
                    </ul>
                </div>
            </div>
        </nav>


    <div class="p-4 md">
<table class="table table-striped ">

  <thead>
    <tr>
      <th scope="col">Full name</th>
      <th scope="col">Facility name</th>
      <th scope="col">Age</th>
      <th scope="col">Gender</th>
      <th scope="col">Last menstrual preriod</th>
      <th scope="col">Expected date of delivery</th>
      <th scope="col">Visit no.</th>
      <th scope="col">Visit date</th>
      <th scope="col">Next visit date</th>
      <th>Action</th>

     

    </tr>
  </thead>
  <tbody>
    <?php
     $sql="Select * from `antenatal`";
     $sults=mysqli_query($conn,$sql);
     if($sults){
      
      while  ($row=mysqli_fetch_assoc($sults)){ ?>

      
      <tr>
      <td><?php echo $row["full_name"]; ?></td>
      <td><?php echo $row["facility_name"]; ?></td>
      <td><?php echo $row["age"]; ?></td>
      <td><?php echo $row["gender"]; ?></td>
      <td><?php echo $row["last_menstrual_period"]; ?></td>
      <td><?php echo $row["expected_date_of_delivery"]; ?></td>
      <td><?php echo $row["visit_no"]; ?></td>
      <td><?php echo $row["visit_date"]; ?></td>
      <td><?php echo $row["next_visit_date"]; ?></td>
      <td class='btn-group btn-group-justified'>                                    
									<a href='antenatal_history.php?view=<?php echo $row["id"]; ?>' class='badge bg-primary text-white'>Details</a>
							</td>
     

      </tr>
      <?php
      }
        // $full_name=$row['full_name'];
        // $facility_name=$row['name1'];
        // $id=$row['id'];
        // $age=$row['age'];
        // $last_menstrual_period=$row['last_menstrual_period'];
        // $EDD=$row['EDD'];
        // $visit=$row['visit'];
        // $visitDate=$row['visitDate'];
        // $next_visit=$row['next_visit'];

//    echo '<tr>
//    <th scope="row">'.$full_name.'</th>
//    <td>'.$facility_name.'</td>
//    <td>'.$id.'</td>
//    <td>'.$age.'</td>
//    <td>'.$last_menstrual_period.'</td>
//    <td>'.$EDD.'</td>
//    <td>'.$visit.'</td>
//    <td>'.$visitDate.'</td>
//    <td>'.$next_visit.'</td>
//  </tr>'; 

     }

    ?>
   
  </tbody>
</table>
    </div>
</body>
</html>

<?php 
    } else{
        header('Location: home.php');
        exit();
    }