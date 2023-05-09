<?php
$mysqli = new mysqli("localhost", "root", "", "hms");

// Check if there is an error in connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the drug names array is set and not empty
    if (isset($_POST["drug_name"]) && !empty($_POST["drug_name"])) {
        // Loop through the submitted drug names and prices
        $drugNames = $_POST["drug_name"];
        $drugPrices = $_POST["drug_price"];
        $count = count($drugNames);
        
        // Prepare the insert statement
        $insertSql = "INSERT INTO drug_price (drug_name, price) VALUES (?, ?)";
        $stmt = $mysqli->prepare($insertSql);
        $stmt->bind_param("ss", $drugName, $price);
        
        // Execute the insert statement for each drug name and price
        for ($i = 0; $i < $count; $i++) {
            $drugName = $drugNames[$i];
            $price = $drugPrices[$i] ?? '';
            
            if ($stmt->execute()) {
                echo "Price inserted for drug: " . $drugName . "<br>";
            } 
            else {
                echo "Error inserting price for drug: " . $drugName . " - " . $stmt->error . "<br>";
            }
        }
        
        $stmt->close();
    } else {
        echo "No drugs were selected.";
    }
}

// Retrieve the list of drugs from the drug table
$drugSql = "SELECT drug_name FROM drug";
$drugResult = $mysqli->query($drugSql);

$mysqli->close();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Assign Drug Prices</title>
    <!DOCTYPE html>
<html>
<head>
    <title>Assign Drug Prices</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-c {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .btn-primary {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        @media only screen and (max-width: 600px) {
            .container {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Assign Drug Prices</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="form-group">
        <label class="form-label" for="drug_name">Select Drug(s):</label>
        <select class="form-control" name="drug_name[]" multiple required>
            <?php while ($drugRow = $drugResult->fetch_assoc()) { ?>
                <option value="<?php echo $drugRow['drug_name']; ?>"><?php echo $drugRow['drug_name']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label class="form-label" for="drug_price">Drug Price (MWK):</label>
        <div class="input-group">
            <input class="form-c" type="text" name="drug_price[]" maxlength="10" required>
        </div>
    </div>
    <button class="btn-primary" type="submit">Submit</button>
</form>

</div>
</body>
</html>
