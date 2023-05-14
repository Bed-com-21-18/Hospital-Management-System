<?php 
    session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Patients List</title>
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
            include "unavbar.php";
        ?>
   <!--NavBar-->
   <nav class="navbar navbar-expand py-3"style="background-color:#F1F6F9;" >
            <div class="container">
			<h5 class="navbar-brand"> Patient List</h5>
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

	<div class="container">
		<div class="table-responsive">
			 
		<table class="table table-bordered  bg-secondary text-light">
			<thead class="thead-light">
				<tr>
					<th>Name</th>
					<th>Date of Birth</th>
					<th>Age</th>
					<th>Sex</th>
					<th>Phone Number</th>
					<th>District</th>
					<th>Village</th>
					<th>Residential</th>
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
                $query = "SELECT * FROM patient ORDER BY name ASC";
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
							<td class='btn-group btn-group-justified'>                                    
									<a href='user_priscribe_form.php?view=<?php echo $row["id"]; ?>' class='badge bg-success'>Proceed</a>
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
   
<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>