<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['uname'])) {
    include "comfig.php";
    include "unavbar.php";

    // Initialize variables for error/success messages
    $error = "";
    $success = "";

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $drug_name = $_POST['drug_name'];
        $drug_price = $_POST['drug_price'];
        $status = $_POST['status'];

        // Validate form data (you can add your own validation rules)
        if (empty($drug_name) || empty($drug_price) || empty($status)) {
            $error = "Please fill in all fields.";
        } else {
            // Check if drug already exists in the database
            $check_sql = "SELECT * FROM drug WHERE drug_name = '$drug_name'";
            $check_result = $mysqli->query($check_sql);

            if ($check_result->num_rows > 0) {
                $error = $drug_name . " already exists";
            } else {
                // Generate random even quantities
                $quantity1 = rand(4, 10) * 2;
                $quantity2 = rand(7, 15) * 2;

                // Calculate drug prices
                $drug_price1 = $drug_price + 300;
                $drug_price2 = $drug_price;

                // Insert the drug into the database
                $stmt = $mysqli->prepare("INSERT INTO drug (drug_name, quantity1, quantity2, drug_price1, drug_price2, status) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("siiiii", $drug_name, $quantity1, $quantity2, $drug_price1, $drug_price2, $status);

                if ($stmt->execute()) {
                    $success = $drug_name . " added successfully";
                } else {
                    $error = "Error: " . $stmt->error;
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adding New Drug</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<style>
    /* Style for the body */
    body {
        background-color: #f2f2f2;
        font-family: Arial, sans-serif;
    }

    /* Style for the form */
    form {
        background-color: #ffffff;
        padding: 20px;
    }

    /* Style for the form header */
    form h2 {
        margin-top: 0;
    }

    /* Style for the form input fields */
    form input[type="number"],
    form input[type="date"],
    form input[type="time"],
    form select,
    form textarea {
        width: 100%;
        padding: 10px;
        border: 2px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-bottom: 10px;
        font-size: 16px;
    }

    /* Style for the form input fields when they are focused */
    form input[type="number"]:focus,
    form input[type="date"]:focus,
    form input[type="time"]:focus,
    form select:focus,
    form textarea:focus {
        border-color: #4CAF50;
    }

    /* Style for the form submit button */
    form button[type="submit"] {
        background-color: primary;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }


    /* Style for the form error message */
    form .error {
        color: red;
        margin-top: 5px;
        font-size: 14px;
    }

    /* Style for the form success message */
    form .success {
        color: green;
        margin-top: 5px;
        font-size: 14px;
    }

    @media (max-width: 768px) {
        .col-md-6 {
            max-width: 100%;
        }
    }
</style>
<body style="margin-top:200px">

<!-- form adding drug data -->
<div class="container mt-5">
    <form method="POST" action="add_drug.php">
        <div class="form-group">
            <h2>Adding New Drug</h2>

            <!-- Display error message if any -->
            <?php if (!empty($error)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                </div>
            <?php } ?>

            <!-- Display success message if any -->
            <?php if (!empty($success)) { ?>
                <div class="alert alert-success" role="alert">
                    <?= $success ?>
                </div>
            <?php } ?>

            <label for="drug_name">Drug Name:</label>
            <input type="text" class="form-control" name="drug_name" id="drug_name" required>
        </div>

        <div class="form-group">
            <label for="drug_price">Price:</label>
            <input type="number" class="form-control" name="drug_price" id="drug_price" required>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" name="status" id="status" required>
                <option>Click to select</option>
                <option value="available">Available</option>
                <option value="not available">Not Available</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add Drug</button>
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
