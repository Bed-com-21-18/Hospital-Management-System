<?php
include 'user_regdb.php';
if (isset($_SESSION['id']) && isset($_SESSION['uname'])) {
    include "unavbar.php";
    include "comfig.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescribe Patient</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="P-2">
            <h4 class="text-center bg-light text-secondary p-2">HISTORY TAKING</h4>
        </div>

       

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card p-1">
                        <form action="" class="" method="post">
                            <div class="row">
                                <h5 class="text-center">Vital sign</h5>
                                <div class="col-md-3">
                                    <div class="form-group mb-1 text-center">
                                        <label><b>General Examination</b></label>
                                        <select name="vital_sign" class="form-select">
                                            <option value="">Select general examination</option>
                                            <option value="pale">Pale conjunctives</option>
                                            <option value="unconscious">Unconscious</option>
                                            <option value="alert">Alert</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-1 text-center">
                                        <label><b>Temperature</b></label>
                                        <input type="text" name="temperature" class="form-control" placeholder="Enter temperature">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-1 text-center">
                                        <label><b>Pulse rate</b></label>
                                        <input type="text" name="pulse_rate" class="form-control" placeholder="Enter pulse rate">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-1 text-center">
                                        <label><b>Respiratory rate</b></label>
                                        <input type="text" name="respiratory_rate" class="form-control" placeholder="Enter respiratory rate">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-1 text-center">
                                        <label><b>Blood pressure</b></label>
                                        <input type="text" name="blood_pressure" class="form-control" placeholder="Enter blood pressure">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-1 text-center">
                                        <label><b>Additional Medical Notes</b></label>
                                        <textarea class="form-control" name="additional_notes" rows="2" placeholder="Enter additional notes"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group py-2 text-center">
                                        <button type="submit" class="btn btn-primary" name="submit">Push</button>
                                        <a class="btn btn-secondary" href="patient_list_user.php">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if (isset($_POST['submit'])) {
            $patientId = $_POST["patient_id"];
            $temperature = $_POST["temperature"];
            $additionalNotes = $_POST["additional_notes"];

            // Concatenate temperature with additional notes
            $notesWithTemperature = $additionalNotes . " (Temperature: " . $temperature . ")";

            // Insert the concatenated value into the database
            // Prepare the SQL statement
            $sql = "UPDATE patient SET symptoms = ? WHERE id = ?";

            // Execute the SQL statement using prepared statements or your preferred database library
            $pdo = new PDO("mysql:host=localhost;dbname=hms", "root", "");
            $stmt = $pdo->prepare($sql);

            $updatedSymptoms = "";
            foreach ($symptoms as $index => $symptom) {
                $temperature =  $temperature[$index];
                $updatedSymptoms .= $symptom . ":" . $temperature . ",";
            }
            $updatedSymptoms = rtrim($updatedSymptoms, ",");

            $stmt->execute([$updatedSymptoms, $patientId]);

            echo '<div class="container py-2">';
            echo '<div class="alert alert-success">Symptoms updated successfully!</div>';
            echo '</div>';
        }
        ?>
            
        
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
<?php
} else {
    header("Location: home.php");
    exit();
}
?>