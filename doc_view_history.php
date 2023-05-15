
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
<?php session_start();
 include "comfig.php";
            include "dnavbar.php";
        ?>
   <!--NavBar-->
   <nav class="navbar py-2"style="background-color:#F1F6F9;" >
            <div class="container">
			<h5 class="navbar-brand text-center"> Patient History</h5>
            </div>
        </nav>


				<?php
            
                if(isset($_GET['doc_history'])){
              $id = $_GET['doc_history'];
              $sql2 = "SELECT * FROM patient WHERE id='$id'";
              $result2 = $mysqli->query($sql2);
            
                  $row = $result2->fetch_assoc();
                  $name = $row['name'];
                  $dob = $row['date'];
                  $age = $row['age'];
                  $sex = $row['gender'];
                  $history = $row['history']; 
                  $prescribed_by = $row['prescribed_by'];
                  $prescribed_on = $row['prescribed_on'];         
                }
            
				
                // Display patient information in table rows
				if ($result2->num_rows > 0) {
                    if(empty($row['history'])){
                    echo "<tr><td colspan='15' class='text-center'>No Medical History found for <b> ".$row['name']."</b></td></tr>";
                    } else {
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
					<th>Medical istory</th>
                    <th>Prescribed By</th>
                    <th>Prescription Date</th>
					</tr>
			        </thead>

			        <tbody>
                    <tr>
							<td><?php echo $row["name"]; ?></td>
							<td><?php echo $row["date"]; ?></td>
							<td><?php echo $row["age"]; ?></td>
                            <td><?php echo $row["gender"]; ?></td>
							<td><?php echo $row["history"]; ?></td>
                            <td><?php echo $row["prescribed_by"]; ?></td>
                            <td><?php echo $row["prescribed_on"]; ?></td>
						</tr> 
                        <?php
					} 
                }
                
                ?>
			</tbody>
		</table>
        <br><br>             
        <button class='btn btn-primary mb-3' onclick='window.history.back()'> Go Back</button>
	</div>
</div>
   
<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>