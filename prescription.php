<?php
// Connect to the database
$host = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get the selected user type
    $user_type = $_POST['user_type'];

    // Get the selected symptoms
    $symptoms = isset($_POST['symptoms']) ? $_POST['symptoms'] : array();

    // Generate the SQL query to fetch the drugs based on user type and symptoms
    $query = "SELECT drug_name, dosage, price, tablets_num FROM drugs WHERE user_type='$user_type' AND (";
    foreach ($symptoms as $symptom) {
        $query .= "symptoms LIKE '%$symptom%' OR ";
    }
    $query = rtrim($query, "OR ");
    $query .= ")";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Display the prescription
    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Prescription based on symptoms selected</h2>";
    echo "<ul>";
    $total_price = 0;
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<li>"  . $row['drug_name']. ",  " . $row['tablets_num']." ( " . $row['dosage'] . " morning, afternoon and evening). @ MWK" . $row['price'] . "</li>";
      $total_price += $row['price'];
    }
    echo "</ul>";
    echo "<h3>Total Price: MWK" . $total_price . "</h3>";
  } else {
    echo "No drugs found for the selected user type and symptoms.";
  }

  // Close the database connection
  mysqli_close($conn);
}
?>