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

     <!--NavBar-->
 <div class="container-fluid mb-5"> <?php include 'unavbar.php'; ?></div>

     <?php
           

            if(isset($_GET['treat'])){
                $id = $_GET['treat'];
            $sql2 = "SELECT * FROM hiv_test_results WHERE id='$id'";
            $result2 = $mysqli->query($sql2);

           while($row = $result2->fetch_assoc()){ 
    
                $name = $row['patient_name'];
                $id = $row['id'];

            }}

        ?>

        <!--Form-->
<section class="p-5 bg-white"> 
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-secondary">HIV treatment</h4>
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
                                    <input type="hidden" class="form-control" value="<?= $id; ?>" id="patient_id" name="id" required> 
                                    <input type="text" class="form-control" value="<?= $name; ?>" id="patient_name" name="patient_name" readonly> 
                                    <input type="hidden" class="form-control" value="<?= 'On treatment'; ?>" name="treatment" required> 
                                </div>
                                <div class="form-group p-2">
                                    <label>Weight in kgs</label>
                                    <input type="text" value="" name="weight" class="form-control"/>
                                </div>
                                <div class="form-group p-2">
                                    <label>Height in meters</label>
                                    <input type="text" value="" name="height" class="form-control"/>
                                </div>
                                <div class="form-group p-2">
                                    <label>HAART Regimen</label>
                                    <select class="form-select" id="test_name" name="drug" required>
                                            <option value="">Select drug</option>
                                            <option value="15PA">15PA</option>
                                            <option value="15PP">15PP</option>
                                            <option value="14A">14A</option>    
                                            <option value="13A">13A</option> 
                                            <option value="6A">6A</option> 
                                            <option value="5A">5A</option> 
                                        </select>
                                </div>
                                <div class="form-group p-2">
                                    <label>Initial date</label>
                                    <input type="date" value="" name="dates" class="form-control"/>
                                </div>
                                <div class="form-group p-2">
                                    <label>Next appointment</label>
                                    <input type="date" value="" name="next_treat" class="form-control"/>
                                </div>
                                <div class="form-group text-center p-4">
                                    <button type="submit" class="btn btn-primary" name="hiv_treat">Submit</button>
                                </div>
                            </form>            
                        </div>
                    </div>
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