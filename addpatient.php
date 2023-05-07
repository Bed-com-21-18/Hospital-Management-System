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

        <!--Form-->
        <?php
    // Include database connection file
    include_once("comfig.php");
    
    // Initialize variables
    $name = "";
    $age = "";
    $gender = "";
    $date = "";
    $mobile = "";
    $address = "";
    
    // Check if the form has been submitted
    if(isset($_POST['submit'])) {
        // Get form data and sanitize input
        $name = mysqli_real_escape_string($mysqli, $_POST['name']);
        $age = mysqli_real_escape_string($mysqli, $_POST['age']);
        $gender = mysqli_real_escape_string($mysqli, $_POST['gender']);
        $date = mysqli_real_escape_string($mysqli, $_POST['date']);
        $mobile = mysqli_real_escape_string($mysqli, $_POST['mobile']);
        $address = mysqli_real_escape_string($mysqli, $_POST['address']);
        
        // Insert form data into the database
        $sql = "INSERT INTO patients (name, age, gender, date, mobile, address) 
                VALUES ('$name', '$age', '$gender', '$date', '$mobile', '$address')";
        
        if ($mysqli->query($sql) === TRUE) {
            // Redirect to patient list page
            header("Location:patient_list.php");
            exit();
        } else {
            // Display error message if insertion failed
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
    }
?>

<!-- HTML form for patient registration -->
<section class="p-4 bg-white"> 
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center text-info">Register Patient</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Age</label>
                                <input type="number" name="age" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" class="form-control" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" id="dateInput" name="date" class="form-control" required>
                            </div>

                            <script>
                                // Generate current date
                                var currentDate = new Date();
                                var formattedDate = currentDate.toISOString().split('T')[0];
                                
                                // Set the generated date as the default value of the input field
                                document.getElementById('dateInput').value = formattedDate;
                            </script>

                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="tel" name="mobile" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" class="form-control" required></textarea>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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