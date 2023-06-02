<?php
include 'user_regdb.php';
if (isset($_SESSION['id']) && isset($_SESSION['uname'])){
  include "unavbar.php";
  include "comfig.php";
        ?>
<!DOCTYPE html>
<html>
<head>
	<title>Patients List</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- Responsive meta tag -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="home.css"/>
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

   <!--NavBar-->
   <nav class="navbar navbar-expand py-1"style="background-color:#F1F6F9;" >
            <div class="container">
			<h3 class="navbar-brand"><b>All Registered Patients</b> </h3>
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
				<div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav ms-auto">
              
               
            <li class="nav-item dropdown">
                  <a href="inpatient.php" class="nav-link p-2">View inPatient List</a>
               </li>
               
        
            </ul>
         </div>

            
		 </div>
        </nav>

		  <!-- Tab Content -->
		  <div class="container mt-4">
            <div class="tab-content">
         
         <div class="tab-pane fade show active">
            <!-- patient list -->
			
			<div class="p-2">
		<div class="row">
		<div class="col-md-12"> 
		<table class="table table-hover bg-light" style="overflow:auto">
                 <thead class="table table-hover">
				<tr>
					<th>Name</th>
					<th>Date of Birth</th>
					<th>Age</th>
					<th>Sex</th>
					<th>Phone Number</th>
					<th>District</th>
					<th>Village</th>
					<th>Residential</th>
					<th>Prescribed By</th>
					<th>Action</th>
					</tr>
			</thead>

			<tbody  id = "myTable">
				<?php
				// Connect to the database
				$conn = new mysqli("localhost", "root", "", "hms");

				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
                $query = "SELECT * FROM patient ORDER BY id DESC";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $result = $stmt->get_result();

				// Display patient information in table rows
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) { ?>
						 <tr>
							<td><?php echo $row["name"]; ?></td>
							<td><?php echo $row["date"]; ?></td>
							<td><?php echo $row["age"]; ?></td>
							<td><?php echo $row["gender"]; ?></td>
							<td><?php echo $row["phoneNumber"]; ?></td>
							<td><?php echo $row["district"]; ?></td>
							<td><?php echo $row["village"]; ?></td>
							<td><?php echo $row["residential"]; ?></td>
							<td><?php echo $row["prescribed_by"]; ?></td>
							<td class='btn-group btn-group-justified'>                                    
									<a href='inpatient_form.php?view=<?php echo $row["id"]; ?>' class='badge bg-primary'>Assign Bed</a>
							</td>
						</tr>
                      <?php  
					}
				} else {
					echo "<tr><td colspan='12' class='text-center'>No patients found</td></tr>";
				}
                    
				// Close the database connection
				$conn->close();
                        
				?>

			</tbody>
		</table>             
	</div>
	</div>
</div>

         </div>
    
   
   ///

           
	
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