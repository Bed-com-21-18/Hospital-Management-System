<?php
include 'user_regdb.php';
if (isset($_SESSION['id']) && isset($_SESSION['uname'])) {
    include "unavbar.php";
    include "comfig.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pharmacy</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Responsive meta tag -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</head>
<body class="p-2" style="margin-top:100px">

    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#F1F6F9;">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="#view" class="nav-link active" data-toggle="tab" id="viewPatientBtn">View Patient List</a>
                    </li>
                    <li class="nav-item">
                        <a href="drug_list.php" class="nav-link text-primary">View Drugs</a>
                    </li>
                    <li class="nav-item">
                        <a href="add_drug.php" class="nav-link text-primary">Add New Drug</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Brand -->
    <div class="container mt-3">
        <h3 class="text-center">Pharmacy</h3>
    </div>

    <!-- Tab Content -->
    <br>
    <br>

    <div class="container">
        <div class="tab-content">
            <div class="tab-pane fade show active" id="view">
                <div class="container p-2">
                    <!-- search -->
                    <input class="form-control me-1 mb-2" id="myInput" style="width:100%; max-width:20rem" type="text" placeholder="Search" aria-label="Search">
                </div>
                <div class="p-2">
                    <div class="table-responsive">
                        <table class="table table-bordered bg-light" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Sex</th>
                                    <th>Drug Assigned</th>
                                    <th>Dosage</th>
                                    <th>Prescribed By</th>
                                    <th>Drug Given By</th>
                                    <th>Drug Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                // Retrieve patients with non-empty drug and dosage fields from the patient table
                                $sql = "SELECT * FROM patient WHERE drug != '' AND dosage != '' ORDER BY id ASC";
                                $result = $mysqli->query($sql);

                                // Display patient information in table rows
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row["name"]; ?></td>
                                            <td><?php echo $row["age"]; ?></td>
                                            <td><?php echo $row["gender"]; ?></td>
                                            <td><?php echo $row["drug"]; ?></td>
                                            <td><?php echo $row["dosage"]; ?></td>
                                            <td><?php echo $row["prescribed_by"]; ?></td>
                                            <td><?php echo $row["drug_given_by"]; ?></td>
                                            <td><?php echo $row["drug_status"]; ?></td>
                                            <td class='btn-group btn-group-justified'>
                                                <a href='drug_given.php?add_medication=<?php echo $row["id"]; ?>' class='badge bg-primary'>Proceed</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='9' class='text-center'>No patients found</td></tr>";
                                }

                                // Close the database connection
                                $mysqli->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Add responsive class to the search input based on device width
        $(window).on('load resize', function () {
            var windowWidth = $(window).width();
            var searchInput = $("#myInput");
            if (windowWidth < 768) {
                searchInput.addClass("form-control-sm");
            } else {
                searchInput.removeClass("form-control-sm");
            }
        });
    </script>

</body>
</html>

<?php 
    } else {
        header("Location: home.php");
        exit();
    }
?>
