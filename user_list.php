<?php 
    include 'user_regdb.php';
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
     <div class="container-fluid mb-5"> <?php include 'unavbar.php'; ?></div>


        <!--Form-->
<section class="p-5 bg-white"> 
        <div class="container">

             <!--Update table-->
                <div class="col-md-12"> 
               
                            <!--NavBar-->
                            <nav class="navbar navbar-expand py-1"style="background-color:#F1F6F9;" >
                                    <div class="container">
                                    <h5 class="navbar-brand"> User List</h5>
                                        <button 
                                        class="navbar-toggler" 
                                        type="button" 
                                        data-bs-toggle="collapse" 
                                        data-bs-target="#navmenu">
                                        <span class="navbar-toggler-icon"></span>
                                        </button>     

                                        <div class="collapse navbar-collapse" id="navmenu">
                                            <ul class="navbar-nav ms-auto">
                                                <li class="nav-item dropdown">
                                                <input class="form-control me-1" id="myInput" style="width:100%; max-width:20rem" type="text" placeholder="Search" aria-label="Search">             
                                                </li> &nbsp;
                                                <a class ="btn btn-secondary" href="user_reg.php">Add New User</a>
                                            </ul>
                                        </div>
                                    </div>
                                </nav>

                <?php
                    $sql = "SELECT * FROM user ORDER BY id DESC";
                    $result = $mysqli->query($sql);
                    
                ?>
                <hr>
                        <table class="table table-hover" style="overflow:auto">
                            <thead class="table table-hover">
                                <tr>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Proffessional</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id = "myTable">
                            <?php while($row = $result->fetch_assoc()) {  ?>
                                <tr>
                                    <td><?php echo $row['uname']; ?></td>
                                    <td><?= $row['email']; ?></td>
                                    <td><?php echo $row['prof']; ?></td>
                                    <td class="btn-group btn-group-justified">
                                    <a href="user_reg.php?edit=<?php echo $row['id']; ?>" class="badge bg-success"><i class="bi bi-pencil-fill"></i></a>                                       
                                    <a href="user_regdb.php?delete=<?php echo $row['id']; ?>" class="badge bg-danger mx-1" onclick="return confirm('This will be deleted completely?');"><i class="bi bi-trash-fill"></i></a>

                                    </td> 
                                </tr>
                            <?php }?>
                            <?php
                    $sql = "SELECT * FROM doctor ORDER BY id DESC";
                    $result = $mysqli->query($sql);
                ?>
                            
                                <?php while($row = $result->fetch_assoc()) { ?>
                                    <td><?= $row['uname']; ?></td>
                                    <td><?= $row['email']; ?></td>
                                    <td><?= $row['prof']; ?></td>
                                    <td class="btn-group btn-group-justified">  
                                    <a href="user_reg.php?edit=<?php echo $row['id']; ?>" class="badge bg-success"><i class="bi bi-pencil-fill"></i></a>                                     
                                    <a href="doctor_regdb.php?delete=<?php echo $row['id']; ?>" class="badge bg-danger mx-1" onclick="return confirm('This will be deleted completely?');"><i class="bi bi-trash-fill"></i></a>

                                        
                                    </td> 
                                </tr>
                            <?php }?>
                            <?php
                    $sql = "SELECT * FROM admins ORDER BY id DESC";
                    $result = $mysqli->query($sql);
                ?>
                                <?php while($row = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?= $row['uname']; ?></td>
                                        <td><?= $row['email']; ?></td>
                                        <td><?= $row['prof']; ?></td>
                                        <td class="btn-group btn-group-justified"> 
                                        <a href="user_reg.php?edit=<?php echo $row['id']; ?>" class="badge bg-success"><i class="bi bi-pencil-fill"></i></a>                                      
                                        <a href="admin_regdb.php?delete=<?php echo $row['id']; ?>" class="badge bg-danger mx-1" onclick="return confirm('This will be deleted completely?');"><i class="bi bi-trash-fill"></i></a>

                                     
                                        </td> 
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