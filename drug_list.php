<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['uname'])){
	include "unavbar.php";
	include "comfig.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Drugs List</title>
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
	<!-- NavBar -->
	<nav class="navbar navbar-expand py-1" style="background-color:#F1F6F9;">
		<div class="container">
			<h5 class="navbar-brand">Drug List</h5>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
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

	<div class="p-4">
		<div class="row">
			<div class="col-md-12">
				<table class="table table-hover bg-light" style="overflow:auto">
					<thead class="table table-hover">
						<tr>
							<th>Name</th>
							<th>Price (MWK)</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="myTable">
						<?php
						include "comfig.php";
						$query = "SELECT * FROM drug ORDER BY drug_name ASC";
						$stmt = $mysqli->prepare($query);
						$stmt->execute();
						$result = $stmt->get_result();

						// Display drug information in table rows
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
								echo "<tr>";
								echo "<td>".$row["drug_name"]."</td>";
								echo "<td>".$row["drug_price2"]."</td>";
								echo "<td class='btn-group btn-group-justified'>";
								echo "<a href='update_drug.php?view=".$row["id"]."' class='badge bg-success'><i class='bi bi-pencil-fill'></i></a>";
								echo "&nbsp;";
								echo "<a href='delete_drug.php?delete=".$row["id"]."' class='badge bg-danger'><i class='bi bi-trash-fill'></i></a>";
								echo "</td>";
								echo "</tr>";
							}
						} else {
							echo "<tr><td colspan='4' class='text-center'>No drugs found</td></tr>";
						}

						// Close the database mysqliection
						$mysqli->close();
						?>
					</tbody>
				</table>
			</div>
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
