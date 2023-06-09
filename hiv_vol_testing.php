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
            include "unavbar.php";
        ?>

        <!--Form-->
<section class="p-4 bg-white"> 
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-secondary">Client Registration</h4>
                        </div>
                        <div class="card-body">
                            <form action="hiv_testdb.php" method="POST">
                            
                            <?php if (isset($_GET['error'])) {?>
                                <p class="error"><?php echo $_GET['error']; ?></p>
                                <?php } ?>
                                
                            <?php if (isset($_GET['success'])) {?>
                                <p class="success"><?php echo $_GET['success']; ?></p>
                                <?php } ?>
                                <div class="form-group p-1">
                                    <label>Name</label>
                                    <input type="text" value="" class="form-control" name="patient_name"> 
                                </div>
                                <div class="form-group p-1">
                                    <label>Location</label>
                                    <input type="text" value="" name="location" class="form-control"/>
                                </div>
                                <div class="form-group p-1">
                                    <label>Sex</label>
                                    <select name="gender" class="form-select">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option> 
                                    </select>
                                </div>
                                <div class="form-group p-1">
                                    <label>Description</label>
                                    <textarea class="form-control" name="descriptions" placeholder="Reasons for testing if any"></textarea>
                                </div> 
                                <div class="form-group text-center p-4">
                                    <button type="submit" class="btn btn-primary" name="volu_testing">Submit</button>
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