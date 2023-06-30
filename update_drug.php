<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['uname'])) {
    include "comfig.php";
    include "unavbar.php";

    // Initialize variables for error/success messages
    $errorMessage = "";
    $successMessage = "";

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $drug_id = $_POST['drug_id'];
        $drug_name = $_POST['drug_name'];
        $drug_price = $_POST['drug_price'];
        $status = $_POST['status'];

        // Validate form data (you can add your own validation rules)
        if (empty($drug_name) || empty($drug_price) || empty($status)) {
            $errorMessage = "Please fill in all fields.";
        } else {
            // Check if drug exists in the database
            $check_sql = "SELECT * FROM drug WHERE id = '$drug_id'";
            $check_result = $mysqli->query($check_sql);

            if ($check_result->num_rows > 0) {
                // Generate random even quantities
                $quantity1 = rand(4, 10) * 2;
                $quantity2 = rand(7, 15) * 2;

                // Calculate drug prices
                $drug_price1 = $drug_price + 300;
                $drug_price2 = $drug_price;

                // Update the drug in the database
                $stmt = $mysqli->prepare("UPDATE drug SET drug_name=?, quantity1=?, quantity2=?, drug_price1=?, drug_price2=?, status=? WHERE id=?");
                $stmt->bind_param("siiiiii", $drug_name, $quantity1, $quantity2, $drug_price1, $drug_price2, $status, $drug_id);

                if ($stmt->execute()) {
                    $successMessage = $drug_name . " updated successfully";
                } else {
                    $errorMessage = "Error: " . $stmt->error;
                }
            } else {
                $errorMessage = $drug_name . " does not exist";
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body style="margin-top:200px">

<div class="container mt-5">
    <form method="POST" action="">
        <div class="form-group">
            <h2>Updating Drug</h2>
            <?php
            if (isset($_GET['view'])) {
                $id = $_GET['view'];
                $sql2 = "SELECT * FROM drug WHERE id='$id'";
                $result2 = $mysqli->query($sql2);

                $row = $result2->fetch_assoc();
                $drug_name = $row['drug_name'];
                $drug_price = $row['drug_price2'];
                $status = $row['status'];
            }
            ?>
            <!-- Display error message if any -->
            <?php if (!empty($errorMessage)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= $errorMessage ?>
                </div>
            <?php } ?>

            <!-- Display success message if any -->
            <?php if (!empty($successMessage)) { ?>
                <div class="alert alert-success" role="alert">
                    <?= $successMessage ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <input type="hidden" class="form-control" value="<?= $id; ?>" name="drug_id" id="drug_id" required>
            </div>
            <label for="drug_name">Drug Name:</label>
            <input type="text" class="form-control" value="<?= $drug_name; ?>" name="drug_name" id="drug_name" required>
        </div>
        <div class="form-group">
            <label for="drug_price">Price:</label>
            <input type="number" class="form-control" value="<?= $drug_price; ?>" name="drug_price" id="drug_price" required>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" name="status" id="status" required>
                <option value="available" <?= $status == 'available' ? 'selected' : ''; ?>>Available</option>
                <option value="not available" <?= $status == 'not available' ? 'selected' : ''; ?>>Not Available</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Drug</button>
        <a href="nurse_dashboard.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>

<?php
} else {
    header("Location: home.php");
    exit();
}
?>
