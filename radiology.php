<?php 
    include 'user_regdb.php';
    include 'radiologydb.php';
    if (isset($_SESSION['id']) && isset($_SESSION['uname'])){

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hospital Management System</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css"/>
        <link rel="stylesheet" href="bootstrap-5.0.0/css/bootstrap.min.css"/>
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
    <body>

     <!--NavBar-->
 <div class="container-fluid mb-5"> <?php include 'unavbar.php'; ?></div>


        <!--Form-->
             <!--Update table-->
                <div class="p-5"> 
                <h3 class="text-center text-secondary">
                    Patients for Scanning
                </h3>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                      <!-- search -->
                            <input class="form-control me-1" id="myInput" style="width:100%; max-width:20rem" type="text" placeholder="Search" aria-label="Search">             
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="radiology_results.php" class="btn btn-secondary text-light mx-1 p-2">View Scanned Patients</a>
                        </div>
                    </div> 
                </div> 
                <?php
                    $sql = "SELECT * FROM radiology ORDER BY id DESC";
                    $result = $mysqli->query($sql);
                    
                ?>
                <hr>
                        <table class="table table-hover" style="overflow:auto">
                            <thead class="table table-hover">
                                <tr>
                               
                                    <th>Name</th>
                                    <th>Type of scan</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id = "myTable">
                            <?php while($row = $result->fetch_assoc()) { 
                                ?>
                                <tr>
                                    <td><?php echo $row['patient_name']; ?></td>
                                    <td><?php echo $row['scan']; ?></td>
                                    <td><?php echo $row['messages']; ?></td>
                                    <td><?php echo $row['statu']; ?></td>
                                    <td class="btn-group btn-group-justified">                                       
                                        <a href="radiology_work.php?proceed=<?php echo $row["patient_id"]; ?>&request=<?php echo $row["scan"]; ?>" class="badge bg-primary text-light p-2 mx-1">Proceed</a>
                                    </td>

                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                </div>
         </div>
    </section>

   
           

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html> 
<?php 
    }else {
        header("Location: home.php");
        exit();
    }
?> 