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
        <!-- Navbar -->
         <!--NavBar-->
   <div class="container-fluid mb-5"> <?php include 'unavbar.php'; ?></div>


        <section class="p-5 text-center">
            <div class="p-5">
                <?php 
                  if(isset($_GET['viewing'])){
                    $id = $_GET['viewing'];
                    $sql = "SELECT * FROM add_radiology WHERE patient_id='$id'";
                    $result = $mysqli->query($sql);      

                    if ($result->num_rows === 0) {
                        echo "No radiology results found."; ?>
                        <br> <button class='btn btn-secondary mb-3' onclick='window.history.back()'> Go Back</button>
                    <?php } else {
                        while($row = $result->fetch_assoc()){
                ?>
                <div class="row p-2">
                    <div class="col-md">
                        <h2 class="text-center text-info">Radiology results</h2>
                        <div class="card border border-dark" style="width:100%">
                            <img src="<?= $row['photo']; ?>" alt="" class="card-img-top" style="width:100%">
                            <div class="card-body text-center">
                                <p><b>Name: </b><?= $row['patient_name']; ?></p>
                                <p><b>Comments: </b><?= $row['comments']; ?></p>
                                <p><b>Date: </b><?= $row['dates']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="btn btn-primary mb-3" href="user_prescribe.php?patient_id=<?= $id; ?>&success=Symptoms, measurements, and general examination were already added"> Proceed</a>
                &nbsp; 
                <button class='btn btn-secondary mb-3' onclick='window.history.back()'> Go Back</button>
                <?php 
                        }
                    }
                  }
                ?>
            </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html> 

<?php 
    } else {
        header("Location: home.php");
        exit();
    }
?>
