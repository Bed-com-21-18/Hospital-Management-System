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
            include "dnavbar.php";
        ?>

        <!--Form-->
<section class="p-4 bg-white"> 
        <div class="container">
            <div class="row">
             <!--Update table-->
                <div class="col-md-12"> 
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
                                    <th>Height</th>
                                    <th>BMI</th>
                                    <th>Drug</th>
                                    <th>Initial date</th>
                                    <th>Next appointment</th>
                                </tr>
                            </thead>
                            <tbody id = "myTable">
                            <?php while($row = $result->fetch_assoc()) 
                            
                            { ?>
                                <tr>
                                    <td><?php echo $row['patient_name']; ?></td>
                                    <td><?php echo $row['weight']; ?></td>
                                    <td><?php echo $row['height']; ?></td>
                                    <td><?php echo $row['weight']/ $row['height']; ?></td>
                                    <td><?php echo $row['drug']; ?></td>
                                    <td><?php echo $row['dates']; ?></td>
                                    <td><?php echo $row['next_treat']; ?></td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                        <a class="btn btn-secondary" href="hiv_patients.php"> Back to Patient List </a>
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