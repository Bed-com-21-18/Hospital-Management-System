
<?php
include 'user_regdb.php';
if (isset($_SESSION['id']) && isset($_SESSION['uname'])) {
    include "unavbar.php";
    include "comfig.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="patient_idport" content="width=device-width, initial-scale=1.0">
    <title>Assigning Drugs  and dosages</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>

<div class="container py-2">
        <?php
        if (isset($_GET['give'])) {
            $id = $_GET['give'];
            $sql2 = "SELECT * FROM patient WHERE id='$id'";
            $result2 = $mysqli->query($sql2);

            $row = $result2->fetch_assoc();
            $id = $row['id'];
            $name = $row['name'];
            $age = $row['age'];
            $date = $row['gender'];
        }
        ?>

<form method="POST" action="user_prescribe_diagnosis.php">
                    <div class="card ">
                       
                        <div class="card ">
                            <div class="row px-4">
                                <h5 class="text-center">Assigning Drugs  and dosages</h5>
                                <div class="col-md-6">
                                    <div class="form-group">
                                                <?php if (isset($_GET['error'])) {?>
                                    <p class="error"><?php echo $_GET['error']; ?></p>
                                    <?php } ?>
                                    
                                <?php if (isset($_GET['success'])) {?>
                                    <p class="success"><?php echo $_GET['success']; ?></p>
                                    <?php } ?>
                                            <select name="drug[]" class="form-select" required multiple onchange="showNotes(this)">
                                            <?php
                                            // Query the database for drugs
                                            $sql = "SELECT * FROM drug ORDER BY drug_name ASC";
                                            $result = mysqli_query($mysqli, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value='" . $row['drug_name'] . "'>" . $row['drug_name'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" id="drugContainer">
                                        <!-- Drug dosage text areas will be dynamically generated here -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group py-2 text-center">
                        <button type="submit" class="btn btn-primary" name="submit">Proceed</button>
                        <a class="btn btn-secondary" href="patient_list_user.php">Cancel</a>
                    </div>
             
        </form>


                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
$(document).ready(function() {

            $('select[name="drug[]"]').change(function() {
                var selectedDrug = $(this).val();
                var drugContainer = $('#drugContainer');
                drugContainer.empty();

                if (selectedDrug.length > 0) {
                    selectedDrug.forEach(function(drug) {
                        var drugInput = '<input type="text" class="form-control" name="drugContainer[] " value="' + drug + ':"><br>';
                        drugContainer.append(drugInput);
                    });
                }
            });
        });
    </script>
 </div>
</body>

</html>
<?php
} else {
    header("Location: user_login.php");
}
?>