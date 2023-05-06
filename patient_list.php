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
<?php
            include "anavbar.php";
        ?>
	<div class="container">
		<h3 class="my-4 text-center">Patients List</h3>	<div class="table-responsive">
		<table class="table table-bordered">
			<thead class="thead-light">
				<tr>
					<th>Name</th>
					<th>Age</th>
					<th>Email</th>
					<th>Date of Birth</th>
					<th>Gender</th>
					<th>Phone Number</th>
					<th>District</th>
					<th>Village</th>
					<th>Residential</th>
					<th>Symptoms</th>
					<th>Prescribed By</th>
					<th>Prescription Time</th>
				</tr>
			</thead>

			<tbody>
				<?php
				// Connect to the database
				$conn = new mysqli("localhost", "root", "", "hms");

				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}

				// Retrieve all patients from the patient table
				$sql = "SELECT * FROM patient ORDER BY id DESC";
				$result = $conn->query($sql);

				// Display patient information in table rows
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						echo "<tr>";
						echo "<td>" . $row["name"] . "</td>";
						echo "<td>" . $row["age"] . "</td>";
						echo "<td>" . $row["email"] . "</td>";
						echo "<td>" . $row["date"] . "</td>";
						echo "<td>" . $row["gender"] . "</td>";
						echo "<td>" . $row["phoneNumber"] . "</td>";
						echo "<td>" . $row["district"] . "</td>";
						echo "<td>" . $row["village"] . "</td>";
						echo "<td>" . $row["residential"] . "</td>";
						echo "<td>" . $row["symptoms"] . "</td>";
						echo "<td>" . $row["prescribed_by"] . "</td>";
						echo "<td>" . $row["prescribed_on"] . "</td>";
						echo "</tr>";
                        ;
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
   <!-- footer -->
   <?php
            include "footer.php";
        ?>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>