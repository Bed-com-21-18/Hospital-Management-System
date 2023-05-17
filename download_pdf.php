<?php
// Include the Composer autoloader
require 'vendor/autoload.php';
include "comfig.php";
include 'user_regdb.php';

use Dompdf\Dompdf;

    if (!isset($_SESSION['uname'])) {
      // User is not authenticated, redirect to login page
      header("Location: doctor_login.php");
      exit();
    }

// retrieve the symptoms and patient ID stored in session
$symptoms = $_SESSION["symptoms"];
$servicefee = 1000;
$patient_id = $_SESSION["patient_id"];

// Prepare and execute the query
$stmt = $mysqli->prepare("SELECT * FROM patient WHERE id = ?");
$stmt->bind_param("i", $patient_id);
$result = $stmt->execute();
if ($result === false) {
  // Display an error message if the query execution failed
  echo "<div class='alert alert-danger' role='alert'>Error: " . $stmt->error . "</div>";
} else {
  // Display the patient details if the query execution succeeded
  $patient = $stmt->get_result()->fetch_assoc();
  $id = $patient['id'];
  $name = $patient['name'];
  $age = $patient['age'];
  $gender = $patient['gender'];
  $date = $patient['date'];
  
  // Create a new Dompdf instance
  $dompdf = new Dompdf();
  
  // Create the PDF content
  $html = '<h1>Prescription Summary</h1>';
$html .= '<h4>Section A: Patient Details</h4>';
$html .= '<div class="row">';
$html .= '<div class="col">';
$html .= '<table class="table table-bordered">';
$html .= '<thead><tr>';
$html .= '<th style="padding: 20px;">Name</th>';
$html .= '<th style="padding: 20px;">Date of Birth</th>';
$html .= '<th style="padding: 20px;">Age</th>';
$html .= '<th style="padding: 20px;">Gender</th>';
$html .= '</tr></thead>';
$html .= '<tbody>';
$html .= '<tr>';
$html .= '<td style="padding: 10px; border: 1px solid black; spacing:10px;">' . $name . '</td>';
$html .= '<td style="padding: 10px; border: 1px solid black;">' . $date . '</td>';
$html .= '<td style="padding: 10px; border: 1px solid black; border-bottom: 1px solid black;">' . $age . '</td>';
$html .= '<td style="padding: 10px; border: 1px solid black; border-bottom: 1px solid black;">' . $gender . '</td>';
$html .= '</tr>';
$html .= '</tbody>';
$html .= '</table>';
$html .= '</div>';
$html .= '</div>';

// Prepare the table for displaying the prescription
$html .= "<div class='row mb-3'>";
$html .= "<div class='table-responsive'>";
$html .= "<table class='table table-striped'>";
$html .= "<thead>";
$html .= "<tr>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "</tr>";
$html .= "<td colspan='4'><hr></td>";
$html .= "<td colspan='4' style='border-top: 2px solid black;'></td>";
$html .= "<tr><th>Symptom</th><th>Drug Name</th><th>Dosage</th><th>Drug Price</th></tr>";
$html .= "</thead>";
$html .= "<tbody>";


  // Loop through the symptoms and display the corresponding drug, dosage, and drug_price
  $age = $patient["age"];
  $patient_id = $patient["id"];
  $name = $patient["name"];
  if ($age <= 13) {
    $total_amount = 0;
    foreach ($symptoms as $symptom) {
      $stmt = $mysqli->prepare("SELECT drug_name, dosage2, drug_price2 FROM drug WHERE symptoms LIKE ?");
      if ($stmt === false) {

        // Display an error message if the query preparation failed
        echo "<div class='alert alert-danger' role='alert'>Error: " . $conn->error . "</div...";
      } else {
        $symptom_pattern = "%{$symptom}%";
        $stmt->bind_param("s", $symptom_pattern);
        $result = $stmt->execute();
        if ($result === false) {

        // Display an error message if the query execution failed
        echo "<div class='alert alert-danger' role='alert'>Error: " . $stmt->error . "</div>";
        } else {
        $rows = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        foreach ($rows as $row) {
            $html .= "<tr>";
            $html .= "</tr>";
            $html .= "<tr>";
            $html .= "<td style='padding: 10px; border: 1px solid black;'>" . $symptom . "</td>";
            $html .= "<td style='padding: 10px; border: 1px solid black;'>" . $row["drug_name"] . "</td>";
            $html .= "<td style='padding: 10px; border: 1px solid black;'>" . $row["dosage2"] . "</td>";
            $html .= "<td style='padding: 10px; border: 1px solid black;'>" . $row["drug_price2"] . "</td>";
            $html .= "</tr>";

            $total_amount += $row["drug_price2"];
            
        }
        }
        }
        }
        } else {
        $total_amount = 0;
        foreach ($symptoms as $symptom) {
        $stmt = $mysqli->prepare("SELECT drug_name, dosage, drug_price FROM drug WHERE symptoms LIKE ?");
        if ($stmt === false) {
        // Display an error message if the query preparation failed
        echo "<div class='alert alert-danger' role='alert'>Error: " . $conn->error . "</div...";
        } else {
        $stmt->bind_param("s", $symptom);
        $result = $stmt->execute();
        if ($result === false) {
        // Display an error message if the query execution failed
        echo "<div class='alert alert-danger' role='alert'>Error: " . $stmt->error . "</div>";
        } else {
        $rows = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        foreach ($rows as $row) {
            $html .= "<tr>";
            $html .= "<td style='padding: 10px; border: 1px solid black;'>" . $symptom . "</td>";
            $html .= "<td style='padding: 10px; border: 1px solid black;'>" . $row["drug_name"] . "</td>";
            $html .= "<td style='padding: 10px; border: 1px solid black;'>" . $row["dosage"] . "</td>";
            $html .= "<td style='padding: 10px; border: 1px solid black;'>" . $row["drug_price"] . "</td>";
            $html .= "</tr>";
            
            $total_amount += $row["drug_price"];
        }
        }
        }
        }
        }
        
        $html .= "</tbody>";
        $html .= "</table>";
        $html .= "<p class='lead'><b> Section B:Biling Details</p>";
        $html .= "<p class='lead'>Below is billing breakdown for:<b> <strong>" . $name . "</strong> </b> who is <strong> " . $age . " years old.</strong></b></p>";
        $html .= "<p class='lead'>The service fee: <strong>" . $servicefee . "</strong></p>";
        $html .= "<p class='lead'>The total amount to be paid for the drugs is: <strong>" . $total_amount . "</strong></p>";
        $total_bill = $servicefee + $total_amount;
        $html .= "<p class='lead'>The Total Bill: <strong> MWK" . $total_bill . "</strong></p>";
        
        // updating total bills
        $stmt = $mysqli->prepare("UPDATE patient SET total_bills=? WHERE id=?");
        $stmt->bind_param("ss", $total_bill, $patient_id);
        $stmt->execute();
        
        if (isset($_SESSION['uname'])) {
        $username = $_SESSION['uname'];
        $stmt = $mysqli->prepare("SELECT * FROM doctor WHERE uname = ?");
        $stmt->bind_param("s", $username);
        $result = $stmt->execute();

        if ($result === false) {
            // Display an error message if the query execution failed
            echo "<div class='alert alert-danger' role='alert'>Error: " . $stmt->error . "</div>";
          } else {
            // Display the doctor's username if the query execution succeeded
            $doctor = $stmt->get_result()->fetch_assoc();
            $prescribed_on = date("H:i:s d-m-Y ");
            $html .= "<p class='list-group-item'><b style='color: green;'>Prescribed by</b><b> " . $doctor['uname'] . "</b>          <b style='color: green;'>Prescribed at </b><b>" . $prescribed_on . " </b></p>";
        }
        }
        
        $html .= '</body>';
$html .= '</html>';

// Load the HTML content into Dompdf
$dompdf->loadHtml($html);

// Set the paper size and orientation (optional)
$dompdf->setPaper('A4', 'portrait');

// Render the PDF
$dompdf->render();

// Generate a unique filename for the PDF
$filename = 'prescription_' . $id . '.pdf';

// Save the PDF to a file
$output = $dompdf->output();
file_put_contents($filename, $output);

// Force download the PDF
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Content-Length: ' . filesize($filename));
readfile($filename);

// Delete the temporary PDF file
unlink($filename);
exit();
}
?>
