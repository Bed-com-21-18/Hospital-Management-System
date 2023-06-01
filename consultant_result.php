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

     <!-- Navbar -->
     <?php
            include "unavbar.php";

            if(isset($_GET['consult'])){
                $id = $_GET['consult'];
            $sql2 = "SELECT * FROM counselling WHERE id='$id'";
            $result2 = $mysqli->query($sql2);

           while($row = $result2->fetch_assoc()){ 
    
                $name = $row['patient_name'];
                $id = $row['id'];

            }}
            
           
 ?>

        <!--Form-->
<section class="p-4 bg-white"> 
        <div class="container">  
            <div class="row justify-content-center">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center text-secondary">Add results</h4>
                            </div>
                             <div class="card-body">
                                <form action="consultingdb.php" method="POST" enctype="multipart/form-data">
                            
                                    <?php if (isset($_GET['error'])) {?>
                                        <p class="error"><?php echo $_GET['error']; ?></p>
                                        <?php } ?>
                                        
                                    <?php if (isset($_GET['success'])) {?>
                                        <p class="success"><?php echo $_GET['success']; ?></p>
                                        <?php } ?>
                                        <div class="form-group p-2">
                                            <input type="hidden" class="form-control" value="<?= $id; ?>" id="id" name="id" required> 
                                            <input type="hidden" class="form-control" value="<?= "Counselled" ?>" name="statu"> 
                                            <input type="text" class="form-control" value="<?= $name; ?>" id="patient_name" name="patient_name" readonly> 
                                        </div>
                                       
                                        <div class="form-group p-2">
                                            <label>Date Counselled</label>
                                            <input type="date" value="" name="dates" class="form-control" required/>
                                        </div>
                                        <div class="form-group text-center p-4">
                                            <button type="submit" class="btn btn-primary" name="counsellor">Submit</button>
                                        </div>
                                    </form>
                            </div>
                            
                        </div>
                    </div>
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