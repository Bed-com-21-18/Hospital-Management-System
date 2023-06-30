<?php
// Connect to the database
include 'comfig.php';

if (isset($_POST['add'])) {
    $id = $_POST['patient_id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $next_of_kin = $_POST['next_of_kin'];
    $religion = $_POST['religion'];
    $occupation = $_POST['occupation'];
    $date = $_POST['date'];
    $birthYear = date('Y', strtotime($date));
    $currentYear = date('Y');
    $age = $currentYear - $birthYear;

    $user_data = 'name=' . $name . '&date=' . $date;

    // Check if the patient ID exists in the database
    $sql = "SELECT * FROM patient WHERE id = '$id'";
    $result = $mysqli->query($sql);

    if (mysqli_num_rows($result) > 0) {
        // Update the patient details
        $sql2 = "UPDATE patient SET name = '$name', date = '$date', gender = '$gender', address = '$address', next_of_kin = '$next_of_kin', religion = '$religion', occupation = '$occupation', age = '$age' WHERE id = '$id'";
        if ($mysqli->query($sql2) === TRUE) {
            header("Location: patient_update.php?view=$id&success=Successfully updated");
            exit();
        } else {
            header("Location: patient_update.php?view=$id&error=Unknown error&$user_data");
            exit();
        }
    } else {
        header("Location: patient_update.php?view=$id&error=The patient ID does not exist&$user_data");
        exit();
    }
}
?>
