
<?php
 include 'user_regdb.php';
 if (isset($_SESSION['id']) && isset($_SESSION['uname'])){
 
   include "comfig.php";
        ?>
<!DOCTYPE html>
<html>
<head>
	<title>View Lab Results</title>
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
     <!--NavBar-->
   <div class="container-fluid mb-5"> <?php include 'unavbar.php'; ?></div>

   
   <nav class="navbar py-5"style="background-color:#F1F6F9;" >
            <div class="container">
			<h5 class="navbar-brand text-center"> Lab results</h5>
            </div>
        </nav>


				<?php
            
                if(isset($_GET['view_results'])){
              $id = $_GET['view_results'];
              $sql2 = "SELECT * FROM patient WHERE id='$id'";
              $result2 = $mysqli->query($sql2);
            
                  $row = $result2->fetch_assoc();
                  $patient_id = $row['id'];
                  $name = $row['name'];
                  $dob = $row['date'];
                  $age = $row['age'];
                  $sex = $row['gender'];
                  $test = $row['tests']; 
                  $lab_results = $row['lab_results'];   
                }
            
				
                // Display patient information in table rows
				if ($result2->num_rows > 0) {
                    if(empty($row['lab_results'])){
                    echo "<tr><td colspan='15' class='text-center'>No lab results found for <b> ".$row['name']."</td></tr>";
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
					<th>Test(s) requested</th>
                    <th>Test Results</th>
					</tr>
			        </thead>

			        <tbody>
                    <tr>
							<td><?php echo $row["name"]; ?></td>
							<td><?php echo $row["date"]; ?></td>
							<td><?php echo $row["age"]; ?></td>
                            <td><?php echo $row["gender"]; ?></td>
							<td><?php echo $row["tests"]; ?></td>
                            <td><?php echo $row["lab_results"]; ?></td>
						</tr> 
                        <?php
					} 
                }
                
                ?>
			</tbody>
		</table>
        <br><br>             
        <a class="btn btn-primary mb-3" href="user_prescribe.php?patient_id=<?php echo $patient_id; ?>&success=Symptoms, measurements, and general examination were already added"> Proceed</a>&nbsp; 
        <button class='btn btn-secondary mb-3' onclick='window.history.back()'> Go Back</button>
        </div>
</div>
   
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