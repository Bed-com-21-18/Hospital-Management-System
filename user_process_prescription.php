<?php
include 'user_regdb.php';
include 'comfig.php';

if (isset($_SESSION['id']) && isset($_SESSION['uname'])) {
        // Retrieve the drugs and dosages from the form submission
        $drugs = $_POST['drugs'];
        $patient_id = $_POST['patient_id'];
        $dosages = $_POST['dosages'];
        
        $stmt = $mysqli->prepare("UPDATE patient SET drug=?, dosage=? WHERE id=?");
        $stmt->bind_param("ssi", $drugs, $dosages, $patient_id);
        
        if ($stmt->execute()) {
            // Redirect to the billing page
            header("Location: billing.php");
            exit();
        } else {
            // Handle the error (e.g., display an error message or redirect to an error page)
            echo "An error occurred while updating drugs.";
        }
    }
 else {
    header("Location: home.php");
    exit();
}
?>
