<?php
    include "comfig.php";
if (isset($_POST['submit'])) {
    $patientId = $_POST["patient_id"];
    $symptoms = $_POST["symptoms"];
    $patient_history = $_POST["patient_history"];
    $patient_historyContainer = $_POST["patient_historyContainer"];
    $examination = $_POST["examination"];
    $notes = $_POST["notes"];
    $durations = $_POST["duration"];
    $measurement = $_POST["measurement"];
    $measurementContainer = $_POST["measurementContainer"];

    // Prepare the SQL statements
    $updateSymptomsSql = "UPDATE patient SET symptoms = ? WHERE id = ?";
    $updateDrugSql = "UPDATE patient SET bio_history = ? WHERE id = ?";
    $updateMeasurementSql = "UPDATE patient SET measurement = ? WHERE id = ?";
    $updateExaminationSql = "UPDATE patient SET examination = ? WHERE id = ?";

    try {
        // Execute the SQL statements using prepared statements or your preferred database library
        $pdo = new PDO("mysql:host=localhost;dbname=hms", "root", "");
        $stmt1 = $pdo->prepare($updateSymptomsSql);
        $stmt4 = $pdo->prepare($updateDrugSql);
        $stmt2 = $pdo->prepare($updateMeasurementSql);
        $stmt3 = $pdo->prepare($updateExaminationSql);

        $updatedSymptoms = "";
        foreach ($symptoms as $index => $symptom) {
            $duration = $durations[$index];
            $updatedSymptoms .= $symptom . ":" . $duration . ",";
        }
        $updatedSymptoms = rtrim($updatedSymptoms, ",");

        $stmt1->execute([$updatedSymptoms, $patientId]);

        
        $updatedPatientHistory = "";
        foreach ($patient_history as $index => $history) {
            $patient_historyValue = $patient_historyContainer[$index];
            $updatedPatientHistory .= $history . ":" .  $patient_historyValue . ",";
        }
        $updatedPatientHistory = rtrim($updatedPatientHistory, ",");
        
        $stmt4->execute([ $updatedPatientHistory, $patientId]);


        $updatedMeasurement = "";
        foreach ($measurement as $index => $measure) {
            $measurementContainerValue = $measurementContainer[$index];
            $updatedMeasurement .= $measure . ":" . $measurementContainerValue . ",";
        }
        $updatedMeasurement = rtrim($updatedMeasurement, ",");

        $stmt2->execute([$updatedMeasurement, $patientId]);

        $updatedExamination = "";
        foreach ($examination as $index => $exam) {
            $note = $notes[$index];
            $updatedExamination .= $exam . ":" . $note . ",";
        }
        $updatedExamination = rtrim($updatedExamination, ",");

        $stmt3->execute([$updatedExamination, $patientId]);

        header("Location: user_prescribe.php?patient_id=$patientId&success=Symptoms, measurements, and general examination added successfully!");
        exit();
    } catch (PDOException $e) {
        header("Location: user_prescribe.php?patient_id=$patientId&error=Failed to update data: " . $e->getMessage());
        exit();
    }
}
?>
