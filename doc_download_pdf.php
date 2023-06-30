<?php 
include 'user_regdb.php';
include "comfig.php";
include "unavbar.php";

if (isset($_SESSION['id']) && isset($_SESSION['uname'])) {
    if (isset($_GET['patient_id'])) {
        $id = $_GET['patient_id'];
        $sql2 = "SELECT * FROM patient WHERE id='$id'";
        $result2 = $mysqli->query($sql2);

        $row = $result2->fetch_assoc();
        $id = $row['id'];
        $name = $row['name'];
        $age = $row['age'];
        $date = $row['date'];
    }

    $patient_id = $id;
    
    if (isset($_SESSION['uname'])) {
        $appoint_id = $_SESSION['appoint_id'];
        $status = "Prescribed by " . $_SESSION['uname'];
        $stmt = $mysqli->prepare("UPDATE appointments SET status=? WHERE id=?");
        $stmt->bind_param("ss", $status, $appoint_id);
        $stmt->execute();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dosage and Billing</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.10.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
        .container {
            padding: 15px;
            border: 1px solid black;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <br><br><br><br>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
                <?php
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
                    $lab_bill = $patient['lab_price'];
                    $tests = $patient['tests'];
                    $rad_bill = $patient['rad_price'];

                    echo "<h1 class='mb-4'>Prescription, Dosage and Billing Summary</h1>";
                ?>
                <table class="table table-hover" style="overflow:auto">
                    <thead class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $age; ?></td>
                            <td><?php echo $gender; ?></td>
                            <td><?php echo $date; ?></td>
                        </tr>
                    </tbody>
                </table>

                <h3 class="mt-4 mb-3">Prescription:</h3>
                <table class="table table-hover" style="overflow:auto">
                    <thead class="table table-hover">
                        <tr>
                            <th>Sr. No.</th>
                            <th>Medicine Name</th>
                            <th>Dosage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $medicines = explode(",", $tests);
                        for ($i = 0; $i < count($medicines); $i++) {
                            $medicine = trim($medicines[$i]);
                            $dosage = $_POST['dosage' . $i];
                            echo "<tr><td>" . ($i + 1) . "</td><td>$medicine</td><td>$dosage</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>

                <h3 class="mt-4 mb-3">Billing Summary:</h3>
                <table class="table table-hover" style="overflow:auto">
                    <thead class="table table-hover">
                        <tr>
                            <th>Particulars</th>
                            <th>Amount (in INR)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Lab Test Charges</td>
                            <td><?php echo $lab_bill; ?></td>
                        </tr>
                        <tr>
                            <td>Radiology Charges</td>
                            <td><?php echo $rad_bill; ?></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td><?php echo ($lab_bill + $rad_bill); ?></td>
                        </tr>
                    </tbody>
                </table>

                <button id="pdfButton" class="btn btn-primary">Generate PDF</button>

                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("pdfButton").addEventListener("click", function() {
            const element = document.getElementById("content");
            html2pdf().from(element).save();
        });
    </script>
</body>

</html>

<?php
} else {
    header("Location: login.php");
    exit();
}
?>
