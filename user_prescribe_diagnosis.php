<?php
include "comfig.php";

if (isset($_POST['submit'])) {
    $patientId = $_POST["patient_id"];
    $patient_history = $_POST["patient_history"];
    $drugContainer = $_POST["drugContainer"];
    $patient_historyContainer = $_POST["patient_historyContainer"];
    $drug = $_POST["drug"];

    // Prepare the SQL statements
    $updatePatientHistorySql  = "UPDATE patient SET drug = ? WHERE id = ?";
    $updateDrugSql= "UPDATE patient SET bio_history = ? WHERE id = ?";
    $updateDosageSql = "UPDATE patient SET dosage = ? WHERE id = ?";

    try {
        $stmt2 = $mysqli->prepare($updateDrugSql);
        $stmt3 = $mysqli->prepare($updatePatientHistorySql);
        $stmt4 = $mysqli->prepare($updateDosageSql);

        $updatedPatientHistory = "";
        foreach ($patient_history as $index => $history) {
            $updatedPatientHistory .= $history . ":" . $patient_historyContainer[$index] . ",";
        }
        $updatedPatientHistory = rtrim($updatedPatientHistory, ",");
        $stmt2->bind_param("si", $updatedPatientHistory, $patientId);
        $stmt2->execute();

        $updatedDrug = implode(",", $drug);
        $stmt3->bind_param("si", $updatedDrug, $patientId);
        $stmt3->execute();

        $updatedDosage = implode(",", $drugContainer);
        $stmt4->bind_param("si", $updatedDosage, $patientId);
        $stmt4->execute();

        header("Location: billing.php?patient_id=$patientId&success=History, drug, patient history, and dosage updated successfully!");
        exit();
    } catch (PDOException $e) {
        header("Location: user_prescribe.php?patient_id=$patientId&error=Failed to update data: " . $e->getMessage());
        exit();
    }
}
?>
