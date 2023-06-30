<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['uname'])) {
    include "unavbar.php";
    include "comfig.php";
    
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $sql2 = "SELECT * FROM drug WHERE id='$id'";
        $result2 = $mysqli->query($sql2);
        $result = $result2->fetch_assoc();
        $name = $result['drug_name'];
        // Fetch the drug information here
        
        // Check if the deletion is confirmed
        if (isset($_GET['confirm']) && $_GET['confirm'] === 'true') {
            // Perform the deletion here
            $deleteSql = "DELETE FROM drug WHERE id='$id'";
            if ($mysqli->query($deleteSql)) {
                // Deletion successful
                header("Location: doc_manage_drug.php");
                exit();
            } else {
                // Deletion failed
                echo "Error deleting drug: " . $mysqli->error;
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Deleting Drug</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Deleting Drug</h2>
        <p>Are you sure you want to delete <b><?= $name; ?>?</b></p>
        <a href="?delete=<?= $id ?>&confirm=true" class="btn btn-danger">Confirm Deletion</a>
        <a href="doc_dashboard.php" class="btn btn-secondary">Cancel</a>
    </div>
</body>
</html>
<?php 
} else {
    header("Location: home.php");
    exit();
}
?>
