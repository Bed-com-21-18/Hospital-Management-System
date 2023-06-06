<?php
include "comfig.php";

if (isset($_POST['submit'])) {
    $patientId = $_POST["patient_id"];
    $history =   $_POST["disease"];
    
    $drugContainer = $_POST["drugContainer"];
    
    $drug = $_POST["drug"];

    // Prepare the SQL statements
    $updateHistorySql = "UPDATE patient SET disease = ? WHERE id = ?";
    
    $updatePatientHistorySql = "UPDATE patient SET drug = ? WHERE id = ?";
    $updateDosageSql = "UPDATE patient SET dosage = ? WHERE id = ?";

    try {
        $stmt1 = $mysqli->prepare($updateHistorySql);
        $stmt3 = $mysqli->prepare($updatePatientHistorySql);
        $stmt4 = $mysqli->prepare($updateDosageSql);

        $updatedHistory = implode(",", $history);
        $stmt1->bind_param("si", $updatedHistory, $patientId);
        $stmt1->execute();

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
