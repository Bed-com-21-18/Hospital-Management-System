<?php 
    include 'admin_regdb.php';
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
        ?>

        <!--Form to register administrator-->
<section class="p-4 bg-white"> 
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-info">Register admin</h4>
                        </div>
                        <div class="card-body">
                        <form action="admin_regdb.php" method="POST">
                       
                       <?php if (isset($_GET['error'])) {?>
                           <p class="error"><?php echo $_GET['error']; ?></p>
                           <?php } ?>
                           
                       <?php if (isset($_GET['success'])) {?>
                           <p class="success"><?php echo $_GET['success']; ?></p>
                           <?php } ?>
                           
                           <div class="form-group mb-3">
                           <input type="hidden" name="id" value="<?= $id; ?>"/>
                               <label>Username</label>
                               <?php if (isset($_GET['uname'])) {?>
                               <input type="text" name="uname" class="form-control" 
                               value="<?php echo $_GET['uname']; ?>"/>
                               <?php }else { ?>
                                   <input type="text" value="<?= $uname; ?>" name="uname" class="form-control"/>
                               <?php }?> 
                           </div>

                           <div class="form-group mb-3">
                               <label>Email</label>
                               <?php if (isset($_GET['email'])) {?>
                               <input type="email" name="email" class="form-control" 
                               value="<?php echo $_GET['email']; ?>"/>
                               <?php }else { ?>
                                   <input type="email" value="<?= $email; ?>" name="email" class="form-control"/>
                               <?php }?> 
                           </div>
                            
                           <div class="form-group mb-3">
                                <label for="professional">Professional</label>
                                <?php if (isset($_GET['prof'])) { ?>
                                    <select name="prof" class="form-control">
                                        <option value="<?php echo $_GET['prof']; ?>"><?php echo $_GET['prof']; ?></option>
                                    </select>
                                <?php } else { ?>
                                    <select name="prof" class="form-control">
                                        <option value="">Select Professional</option>
                                        <option value="Cardiologist">Cardiologist</option>
                                        <option value="Radiologist">Radiologist</option>
                                        <option value="Dermatologist">Dermatologist</option>
                                        <option value="Gastroenterologist">Gastroenterologist</option>
                                        <option value="Neurologist">Neurologist</option>
                                        <option value="Orthopedic">Orthopedic</option>
                                        <option value="Pediatric">Pediatric</option>
                                        <option value="Surgeon">Surgeon</option>
                                        <option value="Physiotherapist">Physiotherapist</option>
                                    </select>
                                <?php } ?>
                            </div>

                       <div class="form-group mb-3">
                           <label>Password</label>
                           <input type="password" value="<?= $pwd; ?>" name="pwd" class="form-control"/>
                       </div>
                       <div class="form-group mb-3">
                           <label>Re-enter Password</label>
                           <input type="password" value="<?= $pwd; ?>" name="re_pwd" class="form-control"/>
                       </div>
                       <div class="form-group mb-3 text-center">
                        <?php if($update == TRUE) {?>
                            <button type="submit" name="update" class="btn btn-info">Update</button>
                        <?php } else {?>
                           <button type="submit" class="btn btn-primary" name="save">Submit</button>
                           <?php } ?>
                       </div>
                   </form>
               
                        </div>
                    </div>
                </div>

             <!--Update table-->
                <div class="col-md-8">  
                <h3 class="text-center text-info p-2">
                    Admin list 
                </h3>
                <hr>
                    <!-- search -->
                        
                        <input class="form-control me-1" id="myInput" style="width:100%; max-width:20rem" type="text" placeholder="Search" aria-label="Search">             
                <hr>
                <?php
                    $sql = "SELECT * FROM admins ORDER BY id DESC";
                    $result = $mysqli->query($sql);
                ?>
                        <div class="container" style="overflow:auto">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Proffessional</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id = "myTable">
                                <?php while($row = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?= $row['uname']; ?></td>
                                        <td><?= $row['email']; ?></td>
                                        <td><?= $row['prof']; ?></td>
                                        <td class="btn-group btn-group-justified">                                       
                                            <a href="admin_regdb.php?delete=<?php echo $row['id']; ?>" class="badge bg-danger mx-1" 
                                            onclick="return confirm('This will be deleted completely?');">Delete</a>
                                            <a href="admin_reg.php?edit=<?php echo $row['id']; ?>" class="badge bg-success">Edit</a>
                                        </td> 
                                    </tr>
                                <?php }?>
                                </tbody>
                            </table>
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