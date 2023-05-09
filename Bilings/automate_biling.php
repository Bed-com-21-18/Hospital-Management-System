<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hms";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the list of patients for the dropdown
$patientSql = "SELECT id, patient_name FROM patients";
$patientsResult = $conn->query($patientSql);

// Retrieve the list of services (drugs) for the dropdown
$serviceSql = "SELECT id, service_name, cost FROM services";
$servicesResult = $conn->query($serviceSql);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patientId = $_POST["patient_id"];
    $serviceId = $_POST["service_id"];
    $billDate = $_POST["bill_date"];
    $amount = 0;

    // Retrieve the patient name from the patients table
    $patientSql = "SELECT patient_name FROM patients WHERE id = $patientId";
    $patientResult = $conn->query($patientSql);
    if ($patientResult->num_rows > 0) {
        $patientRow = $patientResult->fetch_assoc();
        $patientName = $patientRow["patient_name"];

        // Retrieve the drug price from the services table
        $serviceSql = "SELECT cost FROM services WHERE id = $serviceId";
        $serviceResult = $conn->query($serviceSql);
        if ($serviceResult->num_rows > 0) {
            $serviceRow = $serviceResult->fetch_assoc();
            $amount = $serviceRow["cost"];

            // Insert data into the bills table
            $sql = "INSERT INTO bills (patient_id, service_id, bill_date, amount) VALUES ('$patientId', '$serviceId', '$billDate', '$amount')";
            if ($conn->query($sql) === true) {
                echo "Data inserted successfully!";
            } else {
                echo "Error inserting data into bills table: " . $conn->error;
            }
        } else {
            echo "Invalid service selected.";
        }
    } else {
        echo "Invalid patient selected.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Automatic Billing</title>
</head>
<body>
    <h1>Automatic Billing</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="patient_id">Patient Name:</label>
        <select name="patient_id" required>
            <option value="">Select Patient</option>
            <?php while ($patientRow = $patientsResult->fetch_assoc()) { ?>
                <option value="<?php echo $patientRow['id']; ?>"><?php echo $patientRow['patient_name']; ?></option>
            <?php } ?>
        </select><br>

        <label for="service_id">Drug:</label>
        <select name="service_id" required>
            <option value="">Select Drug</option>
            <?php while ($serviceRow = $servicesResult->fetch_assoc()) { ?>
                <option value="<?php echo $serviceRow['id']; ?>"><?php echo $serviceRow['service_name']; ?></option>
            <?php } ?>
        </select><br>

        <label for="bill_date">Bill Date:</label>
        <input type="date" name="bill_date" required><br>

        <input type="submit" value="Submit">
        </form>
</body>
</html>

