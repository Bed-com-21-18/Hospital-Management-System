<?php

// Select the patient's name and bill amount
$sql = "SELECT CONCAT(first_name, ' ', last_name) AS patient_name, amount_charged
        FROM patient
        JOIN bill ON patient.patient_id = bill.patient_id
        WHERE patient.patient_id = 1";
$result = $conn->query($sql);

// Create the table
echo "<table class='table'>";
echo "<thead><tr><th>Patient Name</th><th>Bill Amount</th></tr></thead>";
echo "<tbody>";

// Output the results
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["patient_name"] . "</td>";
    echo "<td>$" . $row["amount_charged"] . "</td>";
    echo "</tr>";
  }
} else {
  echo "<tr><td colspan='2'>No results</td></tr>";
}

echo "</tbody></table>";
?>

<script>
  // Wait for the page to load
  $(document).ready(function() {
    // Initialize DataTables on the table element
    $('table').DataTable()
  });
</script>


