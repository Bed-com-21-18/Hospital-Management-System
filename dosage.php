<?php
if (isset($_SESSION['id']) && isset($_SESSION['uname'])){
    include "comfig.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Patients List</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Responsive meta tag -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
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
<body>
    <div class="">
        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <!-- search -->
                    <input class="form-control me-1" id="myInput" style="width:100%; max-width:20rem" type="text" placeholder="Search" aria-label="Search">             
                </li>
            </ul>
        </div>

        <table class="table table-bordered bg-light" id='myInput'>
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
                // Connect to the database
                $conn = new mysqli("localhost", "root", "", "hms");

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Retrieve patients with non-empty drug and dosage fields from the patient table
                $sql = "SELECT * FROM patient WHERE drug != '' AND dosage != '' ORDER BY id ASC";
                $result = $conn->query($sql);

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
                                <a href='drug_given.php?add_medication=<?php echo $row["id"]; ?>' class='badge bg-success'>Proceed</a>
                            </td>
                        </tr>
                        <?php  
                    }
                } else {
                    echo "<tr><td colspan='12' class='text-center'>No patients found</td></tr>";
                }
                    
                // Close the database connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php 
} else {
    header("Location: home.php");
    exit();
}
?> 
