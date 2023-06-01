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

            
            if(isset($_GET['hiv_results'])){
                $id = $_GET['hiv_results'];
            $sql2 = "SELECT * FROM hiv_test WHERE patient_id='$id'";
            $result2 = $mysqli->query($sql2);

           while($row = $result2->fetch_assoc()){ 
    
                $name = $row['patient_name'];
                $id = $row['patient_id'];

            }}
            
 ?>
 <section>
 <!--Update table-->
            <div class="container p-2"> 
                <h3 class="text-center text-secondary">
                    HIV/AIDS test results
                </h3>
                      <!-- search -->
                        <input class="form-control me-1" id="myInput" style="width:100%; max-width:20rem" type="text" placeholder="Search" aria-label="Search">             
               
                <?php
                 
                    $sql = "SELECT * FROM hiv_test WHERE patient_id='$id' ORDER BY id DESC";
                    $result = $mysqli->query($sql);
                ?>
                <hr>
                        <table class="table table-hover" style="overflow:auto">
                            <thead class="table table-hover">
                                <tr>
                                    <th>Name</th>
                                    <th>Date tested</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id = "myTable">
                            <?php while($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row['patient_name']; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td><?php echo $row['statu']; ?></td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
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
            