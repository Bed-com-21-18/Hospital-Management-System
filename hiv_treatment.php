<?php 
    include 'user_regdb.php';
    include 'hiv_testdb.php';
    include 'comfig.php';
    if (isset($_SESSION['id']) && isset($_SESSION['uname'])){

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hospital Management System</title>
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

     <!-- Navbar -->
     <?php
            include "anavbar.php";

            if(isset($_GET['treat'])){
                $id = $_GET['treat'];
            $sql2 = "SELECT * FROM patient WHERE id='$id'";
            $result2 = $mysqli->query($sql2);

           while($row = $result2->fetch_assoc()){ 
    
                $name = $row['name'];
                $id = $row['id'];

            }}
        ?>

        <!--Form-->
<section class="p-4 bg-white"> 
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-secondary">Add treatment</h4>
                        </div>
                        <div class="card-body">
                            <form action="hiv_testdb.php" method="POST">
                            
                            <?php if (isset($_GET['error'])) {?>
                                <p class="error"><?php echo $_GET['error']; ?></p>
                                <?php } ?>
                                
                            <?php if (isset($_GET['success'])) {?>
                                <p class="success"><?php echo $_GET['success']; ?></p>
                                <?php } ?>
                                <div class="form-group p-2">
                                    <input type="hidden" class="form-control" value="<?= $id; ?>" id="patient_id" name="patient_id" required> 
                                    <input type="hidden" class="form-control" value="<?= $name; ?>" id="patient_name" name="patient_name" readonly> 
                                </div>
                                <div class="form-group p-2">
                                    <label>Weight in kgs</label>
                                    <input type="text" value="" name="weight" class="form-control" required/>
                                </div>
                                <div class="form-group p-2">
                                    <label>Drug</label>
                                    <input type="text" value="" name="drug" class="form-control" required/>
                                </div>
                                <div class="form-group p-2">
                                    <label>Date treated</label>
                                    <input type="date" value="" name="dates" class="form-control" required/>
                                </div>
                                <div class="form-group p-2">
                                    <label>Next treated</label>
                                    <input type="date" value="" name="next_treat" class="form-control" required/>
                                </div>
                                <div class="form-group text-center p-4">
                                    <button type="submit" class="btn btn-primary" name="hiv_treat">Submit</button>
                                </div>
                            </form>            
                            </div>
                    </div>
                </div>
        

             <!--Update table-->
                <div class="col-md-8"> 
                <h3 class="text-center text-secondary">
                    Treatment list
                </h3>
                      <!-- search -->
                        <input class="form-control me-1" id="myInput" style="width:100%; max-width:20rem" type="text" placeholder="Search" aria-label="Search">             
               
                <?php
                    $sql = "SELECT * FROM hiv_treatment ORDER BY id DESC";
                    $result = $mysqli->query($sql);
                ?>
                <hr>
                        <table class="table table-hover" style="overflow:auto">
                            <thead class="">
                                <tr>
                                    <th>Name</th>
                                    <th>Weight</th>
                                    <th>Drug</th>
                                    <th>Date treated</th>
                                    <th>Next treatment</th>
                                </tr>
                            </thead>
                            <tbody id = "myTable">
                            <?php while($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row['patient_name']; ?></td>
                                    <td><?php echo $row['weight']; ?></td>
                                    <td><?php echo $row['drug']; ?></td>
                                    <td><?php echo $row['dates']; ?></td>
                                    <td><?php echo $row['next_treat']; ?></td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                </div>
         </div>
    </section>

    <!-- footer -->
        <?php
            include "footer.php";
        ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html> 
<?php 
    }else {
        header("Location: home.php");
        exit();
    }
?> 