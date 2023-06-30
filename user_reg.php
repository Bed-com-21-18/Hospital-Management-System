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
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-secondary">Register user</h4>
                        </div>
                        <div class="card-body">
                        <form action="user_regdb.php" method="POST">
                       <?php if (isset($_GET['error'])) {?>
                           <p class="error"><?php echo $_GET['error']; ?></p>
                           <?php } ?>
                           
                       <?php if (isset($_GET['success'])) {?>
                           <p class="success"><?php echo $_GET['success']; ?></p>
                           <?php } ?>
                           
                           <div class="form-group mb-3">
                                <input type="hidden" name="id" value="<?= $id; ?>"/>
                               <label>Username</label>
                               <input type="text" name="uname" class="form-control" value="<?php echo isset($_GET['uname']) ? $_GET['uname'] : $uname; ?>"/>
                           </div>
                           <div class="form-group mb-3">
                               <label>Email</label>
                               <input type="email" name="email" class="form-control" value="<?php echo isset($_GET['email']) ? $_GET['email'] : $email; ?>"/>
                           </div>
                           
                           <div class="form-group mb-3">
                                <label for="professional">Professional</label>
                                <select name="prof" required class="form-select">
                                    <option disabled selected>Select Professional</option>
                                    <option value="Cardiologist" <?php echo isset($_GET['prof']) && $_GET['prof'] == 'Cardiologist' ? 'selected' : ''; ?>>Cardiologist</option>
                                    <option value="Radiologist" <?php echo isset($_GET['prof']) && $_GET['prof'] == 'Radiologist' ? 'selected' : ''; ?>>Radiologist</option>
                                    <option value="Dermatologist" <?php echo isset($_GET['prof']) && $_GET['prof'] == 'Dermatologist' ? 'selected' : ''; ?>>Dermatologist</option>
                                    <option value="Gastroenterologist" <?php echo isset($_GET['prof']) && $_GET['prof'] == 'Gastroenterologist' ? 'selected' : ''; ?>>Gastroenterologist</option>
                                    <option value="Neurologist" <?php echo isset($_GET['prof']) && $_GET['prof'] == 'Neurologist' ? 'selected' : ''; ?>>Neurologist</option>
                                    <option value="Orthopedic" <?php echo isset($_GET['prof']) && $_GET['prof'] == 'Orthopedic' ? 'selected' : ''; ?>>Orthopedic</option>
                                    <option value="Medical Lab Scientist" <?php echo isset($_GET['prof']) && $_GET['prof'] == 'Medical Lab Scientist' ? 'selected' : ''; ?>>Medical Lab Scientist</option>
                                    <option value="Pediatric" <?php echo isset($_GET['prof']) && $_GET['prof'] == 'Pediatric' ? 'selected' : ''; ?>>Pediatric</option>
                                    <option value="Surgeon" <?php echo isset($_GET['prof']) && $_GET['prof'] == 'Surgeon' ? 'selected' : ''; ?>>Surgeon</option>
                                    <option value="Physiotherapist" <?php echo isset($_GET['prof']) && $_GET['prof'] == 'Physiotherapist' ? 'selected' : ''; ?>>Physiotherapist</option>
                                    <option value="Nurse" <?php echo isset($_GET['prof']) && $_GET['prof'] == 'Nurse' ? 'selected' : ''; ?>>Nurse</option>
                                    <option value="Pharmacist" <?php echo isset($_GET['prof']) && $_GET['prof'] == 'Pharmacist' ? 'selected' : ''; ?>>Pharmacist</option>
                                    <option value="Accountant" <?php echo isset($_GET['prof']) && $_GET['prof'] == 'Accountant' ? 'selected' : ''; ?>>Accountant</option>
                                    <option value="Receptionist" <?php echo isset($_GET['prof']) && $_GET['prof'] == 'Receptionist' ? 'selected' : ''; ?>>Receptionist</option>
                                    <option value="Clinician" <?php echo isset($_GET['prof']) && $_GET['prof'] == 'Clinician' ? 'selected' : ''; ?>>Clinician</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="role">Role</label>
                                <select name="role" class="form-select">
                                    <option disabled selected>Select Role</option>
                                    <option value="Admin" <?php echo isset($_GET['role']) && $_GET['role'] == 'Admin' ? 'selected' : ''; ?>>Admin</option>
                                    <option value="Doctor" <?php echo isset($_GET['role']) && $_GET['role'] == 'Doctor' ? 'selected' : ''; ?>>Doctor</option>
                                    <option value="Nurse" <?php echo isset($_GET['role']) && $_GET['role'] == 'Nurse' ? 'selected' : ''; ?>>Nurse</option>
                                    <option value="Pharmacist" <?php echo isset($_GET['role']) && $_GET['role'] == 'Pharmacist' ? 'selected' : ''; ?>>Pharmacist</option>
                                    <option value="Accountant" <?php echo isset($_GET['role']) && $_GET['role'] == 'Accountant' ? 'selected' : ''; ?>>Accountant</option>
                                    <option value="Medical Lab Scientist" <?php echo isset($_GET['role']) && $_GET['role'] == 'Medical Lab Scientist' ? 'selected' : ''; ?>>Medical Lab Scientist</option>
                                </select>
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
                                    <button type="submit" name="update" class="btn btn-success">Update</button>
                                <?php } else {?>
                                   <button type="submit" class="btn btn-primary" name="save">Submit</button>
                                   <?php } ?>
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
