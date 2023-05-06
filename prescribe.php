<?php
session_start();


// Check if the form was submitted
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Sanitize the input data
	$patient_id = filter_var($_POST['patient_id'], FILTER_SANITIZE_NUMBER_INT);
	$medicine = filter_var($_POST['medicine'], FILTER_SANITIZE_STRING);
	$dosage = filter_var($_POST['dosage'], FILTER_SANITIZE_STRING);
	$instructions = filter_var($_POST['instructions'], FILTER_SANITIZE_STRING);
	
	// Connect to the database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "hospital";

	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// Prepare and execute the SQL statement to insert the prescription
	$stmt = $conn->prepare("INSERT INTO prescriptions (patient_id, doctor_id, medicine, dosage, instructions) VALUES (?, ?, ?, ?, ?)");
	$stmt->bind_param("iisss", $patient_id, $_SESSION['doctor_id'], $medicine, $dosage, $instructions);
	$stmt->execute();

	// Close the database connection
	$stmt->close();
	$conn->close();

	// Redirect back to the patient's profile page
	header("Location: patient_profile.php?id=$patient_id");
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Prescribe Medicine</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<!-- Custom CSS -->
	<style>
		.form-label {
			font-weight: bold;
		}
		@media only screen and (max-width: 768px) {
			.form-group.row {
				display: block;
			}
			.form-group.row label {
				margin-bottom: 5px;
			}
		}
	</style>
</head>
<body>
	<div class="container mt-5">
		<h1 class="text-center mb-5">Prescribe Medicine</h1>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<div class="form-group row">
				<label for="patient_id" class="col-sm-2 col-form-label form-label">Patient ID:</label>
				<div class="col-sm-10">
					<input type="text" name="patient_id" id="patient_id" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="medicine" class="col-sm-2 col-form-label form-label">Medicine:</label>
				<div class="col-sm-10">
					<input type="text" name="medicine" id="medicine" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="dosage" class="col-sm-2 col-form-label form-label">Dosage:</label>
<div class="col-sm-10">
<input type="text" name="dosage" id="dosage" class="form-control" required>
</div>
</div>
<div class="form-group row">
<label for="instructions" class="col-sm-2 col-form-label form-label">Instructions:</label>
<div class="col-sm-10">
<textarea name="instructions" id="instructions" rows="3" class="form-control" required></textarea>
</div>
</div>
<div class="form-group text-center">
<button type="submit" class="btn btn-primary">Prescribe</button>
</div>
</form>
</div>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
