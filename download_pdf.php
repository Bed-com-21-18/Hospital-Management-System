<?php
// Include the Composer autoloader
require 'vendor/autoload.php';
include "config.php";
include 'user_regdb.php';

use Dompdf\Dompdf;

if (!isset($_SESSION['uname'])) {
  // User is not authenticated, redirect to login page
  header("Location: user_login.php");
  exit();
}

if (isset($_GET['download'])) {
  $id = $_GET['download'];
  $sql2 = "SELECT * FROM patient WHERE id='$id'";
  $result2 = $mysqli->query($sql2);
  $row = $result2->fetch_assoc();

  $name = $row['name'];
  $age = $row['age'];
  $gender = $row['gender'];
  $date = $row['date'];
  $lab_bill = $row['lab_price'];
  $tests = $row['tests'];
  $rad_bill = $row['rad_price'];
  $drugs = explode(",", $row['drug']);
  $dosage = $row['dosage'];

  $_SESSION['name'] = $row['name'];

  // Create a new Dompdf instance
  $dompdf = new Dompdf();

  // Create the PDF content
  $html = '<html>';
  $html .= '<body>';
  $html .= '<div class="container" style="padding: 15px; border: 3px solid black; box-sizing: border-box;">';
  $html .= '<h1 class="mb-4">Prescription, Dosage, and Billing Summary</h1>';
  $html .= '<h4>Section A: Patient Details</h4>';
  $html .= '<div class="row">';
  $html .= '<div class="col">';
  $html .= '<table class="table table-bordered">';
  $html .= '<thead><tr>';
  $html .= '<th style="padding: 10px; border: 1px solid black;">Patient Name</th>';
  $html .= '<th style="padding: 10px; border: 1px solid black;">Date of Birth</th>';
  $html .= '<th style="padding: 10px; border: 1px solid black;">Age</th>';
  $html .= '<th style="padding: 10px; border: 1px solid black;">Gender</th>';
  $html .= '</tr></thead>';
  $html .= '<tbody>';
  $html .= '<tr>';
  $html .= '<td style="padding: 10px; border: 1px solid black;">' . $name . '</td>';
  $html .= '<td style="padding: 10px; border: 1px solid black;">' . $date . '</td>';
  $html .= '<td style="padding: 10px; border: 1px solid black;">' . $age . '</td>';
  $html .= '<td style="padding: 10px; border: 1px solid black;">' . $gender . '</td>';
  $html .= '</tr>';
  $html .= '</tbody>';
  $html .= '</table>';
  $html .= '</div>';
  $html .= '</div>';
  $html .= '<br>';

  // Prepare the table for displaying the prescription
  $html .= '<div class="row mb-3">';
  $html .= '<div class="table-responsive">';
  $html .= '<table class="table table-striped">';
  $html .= '<thead>';
  $html .= '<h4>Section B: Drugs and Dosage</h4>';
  $html .= '<tr><th style="padding: 10px; border: 1px solid black;">Drug Name</th><th style="padding: 10px; border: 1px solid black;">Drug Price</th></tr>';
  $html .= '</thead>';
  $html .= '<tbody>';

  $total_amount = 0;

  // Fetch the matching drugs based on drug name from the drug table
  foreach ($drugs as $drug) {
    $drugNamePattern = "%$drug%";
    $stmt = $mysqli->prepare("SELECT drug_name, drug_price2 FROM drug WHERE drug_name LIKE ?");
    $stmt->bind_param("s", $drugNamePattern);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $html .= '<tr><td style="padding: 10px; border: 1px solid black;">' . $row["drug_name"] . '</td><td style="padding: 10px; border: 1px solid black;">' . $row["drug_price2"] . '</td></tr>';
        $total_amount += $row["drug_price2"];
      }
    }
  }

  $total_bill = $total_amount + 1000 + $rad_bill + $lab_bill;
  $html .= '<tr><td colspan="6"><hr></td></tr>';
  $html .= '<tr><td colspan="2"><p class="lead"><strong> Dosage: </strong>' . $dosage . '</p></td></tr>';
  $html .= '<h4>Section C: Bill Breakdown</h4>';
  $html .= '<tr><td colspan="12"><hr></td></tr>';
  $html .= '<tr><td colspan="2"><p class="lead"><b>The Service Fee:</b></p></td><td colspan="2">MWK 1000</td></tr>';
  $html .= '<tr><td colspan="2"><p class="lead"><b>The bill for drugs fee:</b></p></td><td colspan="2">MWK ' . $total_amount . '</td></tr>';

  // Conditionally include the bill amounts for laboratory and radiology tests
  if ($lab_bill > 0) {
    $html .= '<tr><td colspan="2"><p class="lead"><b>The bill for laboratory test: <b>' . $tests . '</b></p></td><td colspan="2">MWK ' . $lab_bill . '</td></tr>';
  }
  if ($rad_bill > 0) {
    $html .= '<tr><td colspan="2"><p class="lead"><b>The bill for Radiology test: </b></p></td><td colspan="2"> MWK ' . $rad_bill . '</td></tr>';
  }

  $html .= '<tr><td colspan="2"><p class="lead"><b>Total Bill:</b></p></td><td colspan="2">MWK ' . $total_bill . '</td></tr>';

  if (isset($_SESSION['uname'])) {
    $username = $_SESSION['uname'];
    $stmt = $mysqli->prepare("SELECT * FROM user WHERE uname = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result === false) {
      // Display an error message if the query execution failed
      echo '<div class="alert alert-danger" role="alert">Error: ' . $stmt->error . '</div>';
    } else {
      // Display the user's username if the query execution succeeded
      $user = $result->fetch_assoc();
      $prescribed_on = date("H:i:s d-m-Y ");
      $html .= '<tr><td colspan="12"><hr></td></tr>';
      $html .= '<tr><td colspan="4"><p class="list-group-item"><b style="color: green;">Prescribed by</b><b> ' . $username . '  &nbsp;</b> <b style="color: green;">Prescribed at </b><b>' . $prescribed_on . '  </b></p></td></tr>';
      $html .= '<tr><td colspan="12"><hr></td></tr>';
    }
  }
  
  $html .= '</tbody>';
  $html .= '</table>';
  $html .= '</div>';
  $html .= '</div>';
  $html .= '</div>';
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
