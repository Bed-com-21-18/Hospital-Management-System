<?php
session_start();
include "comfig.php";

if (isset($_SESSION['id']) && isset($_SESSION['uname']) && isset($_SESSION['prof'])) {
    $prof = $_SESSION['prof'];
    $role = $_SESSION['role'];
    $usertype = $_SESSION['usertype'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hospital Management System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="home.css" />
    <style>
        .icon-image {
            width: 60px;
            height: 60px;
            object-fit: contain;
        }
    </style>
</head>

<body>
    <!--NavBar-->
    <div class="container-fluid mb-5"> <?php include 'unavbar.php'; ?></div>

    <div class="container-fluid my-auto p-5" >
        <div class="row justify-content-center">

            <section class="modules"  style="margin-top: 100px;">
                <div class="container p-4">
                    <div class="row text-center g-4">
                    <?php if ($usertype === 'Other_user') { 
                        if ($prof === 'Nurse' || $prof === 'Clinician') { ?>
                            
                            <div class="col-md-4">
                                <div class="card text-dark flex-fill">
                                    <div class="card-body text-center">
                                        <div class="h1 mb-3">
                                            <img src="img/advice.png" alt="Outpatient" class="icon-image">
                                        </div>
                                        <h3 class="card-title mb-3 text-primary">Outpatient</h3>
                                        <a href="patient_list_user.php" class="btn btn-primary">Proceed</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-dark flex-fill">
                                    <div class="card-body text-center">
                                        <div class="h1 mb-3">
                                            <img src="img/doctor1.png" alt="Outpatient" class="icon-image">
                                        </div>
                                        <h3 class="card-title mb-3 text-primary">Inpatients</h3>
                                        <a href="inpatient.php" class="btn btn-primary">Proceed</a>
                                    </div>
                                </div>
                            </div>

                        
                        <div class="col-md-4">
                            <div class="card text-dark flex-fill">
                                <div class="card-body text-center">
                                    <div class="h1 mb-3">
                                        <img src="img/blood-test.png" alt="Outpatient" class="icon-image">
                                    </div>
                                    <h3 class="card-title mb-3 text-primary">HIV/AIDS</h3>
                                    <a href="hiv_test.php" class="btn btn-primary">Proceed</a>
                                </div>
                            </div>
                        </div>
                       

                            <div class="col-md-4">
                                <div class="card text-dark flex-fill">
                                    <div class="card-body text-center">
                                        <div class="h1 mb-3">
                                            <img src="img/consultation.png" alt="Outpatient" class="icon-image">
                                        </div>
                                        <h3 class="card-title mb-3 text-primary">Counseling</h3>
                                        <a href="consultant_list.php" class="btn btn-primary">Proceed</a>
                                    </div>
                                </div>
                            </div>
                           
                        <?php } elseif ($prof === 'Receptionist') { ?>
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
            

                            <!--NavBar-->
                            <nav class="navbar navbar-expand py-1"style="background-color:#F1F6F9;" >
                                    <div class="container">
                                    <h5 class="navbar-brand"> Patient List</h5>
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
                                                <a class ="btn btn-secondary" href="patient_reg.php">Add New Patient</a>
                                            </ul>
                                        </div>
                                    </div>
                                </nav>

                                <div class="p-2">
                                    <div class="row">
                                    <div class="col-md-12"> 
                                    <table class="table table-hover bg-light" style="overflow:auto">
                                            <thead class="table table-hover">
                                            <tr>
                                                <th>Name</th>
                                                <th>Date of Birth</th>
                                                <th>Age</th>
                                                <th>Sex</th>
                                                <th>Contact address</th>
                                                <th>Next of kin</th>
                                                <th>Religion</th>
                                                <th>Occupation</th>
                                                <th>Action</th>
                                                </tr>
                                        </thead>

                                        <tbody  id = "myTable">
                                            <?php
                                            
                                            $query = "SELECT * FROM patient ORDER BY id DESC";
                                            $stmt = $mysqli->prepare($query);
                                            $stmt->execute();
                                            $result = $stmt->get_result();

                                            // Display patient information in table rows
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) { ?>
                                                    <tr>
                                                        <td><?php echo $row["name"]; ?></td>
                                                        <td><?php echo $row["date"]; ?></td>
                                                        <td><?php echo $row["age"]; ?></td>
                                                        <td><?php echo $row["gender"]; ?></td>
                                                        <td><?php echo $row["address"]; ?></td>
                                                        <td><?php echo $row["next_of_kin"]; ?></td>
                                                        <td><?php echo $row["religion"]; ?></td>
                                                        <td><?php echo $row["occupation"]; ?></td>
                                                        <td class='btn-group btn-group-justified'>                                                              
                                                            <a href='patient_update.php?view=<?php echo $row["id"]; ?>' class='badge bg-success'>Update</a> &nbsp;
                                                        </td>
                                                    </tr>
                                                <?php  
                                                }
                                            } else {
                                                echo "<tr><td colspan='12' class='text-center'>No patients found</td></tr>";
                                            }
                                                
                                            // Close the database connection
                                            $mysqli->close();
                                                    
                                            ?>

                                        </tbody>
                                    </table>             
                                </div>
                                </div>
                            </div>
            


                        <?php } elseif ($prof === 'Pharmacist') { ?>
                          <!-- ordinary pharmacist -->
                          <!DOCTYPE html>
                            <html>
                            <head>
                                <title>Pharmacy</title>
                                <!-- Bootstrap CSS -->
                                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                                <!-- Responsive meta tag -->
                                <meta name="viewport" content="width=device-width, initial-scale=1">
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
                            <body class="p-2">

                                <!-- NavBar -->
                                <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#F1F6F9;">
                                    <div class="container">
                                        <h3 class="navbar-brand">Pharmacy</h3>
                                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navmenu">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>
                                        <div class="collapse navbar-collapse" id="navmenu">
                                            <ul class="navbar-nav ml-auto">
                                                <li class="nav-item dropdown">
                                                    <a href="#view" class="nav-link p-2 active" data-toggle="tab" id="viewPatientBtn">View Patient List</a>
                                                </li>
                                                <li class="nav-item dropdown">
                                                    <a href="drug_list.php" class="nav-link p-2">View Drugs</a>
                                                </li>
                                                <li class="nav-item dropdown">
                                                    <a href="add_drug.php" class="nav-link p-2">Add New Drug</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </nav>

                                <!-- Tab Content -->
                                <br>
                                <br>

                                <div class="container">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="view">
                                            <div class="container p-2">
                                                <!-- search -->
                                                <input class="form-control me-1 mb-2" id="myInput" style="width:100%; max-width:20rem" type="text" placeholder="Search" aria-label="Search">
                                            </div>
                                            <div class="p-2">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered bg-light" id="myTable">
                                                                <thead class="thead-light">
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>Age</th>
                                                                        <th>Sex</th>
                                                                        <th>Drug Assigned</th>
                                                                        <th>Dosage</th>
                                                                        <th>Prescribed By</th>
                                                                        <th>Drug Given By</th>
                                                                        <th>Drug Status</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
                                                                    <?php
                                                                    // Retrieve patients with non-empty drug and dosage fields from the patient table
                                                                    $sql = "SELECT * FROM patient WHERE drug != '' AND dosage != '' ORDER BY id ASC";
                                                                    $result = $mysqli->query($sql);

                                                                    // Display patient information in table rows
                                                                    if ($result->num_rows > 0) {
                                                                        while ($row = $result->fetch_assoc()) {
                                                                            ?>
                                                                            <tr>
                                                                                <td><?php echo $row["name"]; ?></td>
                                                                                <td><?php echo $row["age"]; ?></td>
                                                                                <td><?php echo $row["gender"]; ?></td>
                                                                                <td><?php echo $row["drug"]; ?></td>
                                                                                <td><?php echo $row["dosage"]; ?></td>
                                                                                <td><?php echo $row["prescribed_by"]; ?></td>
                                                                                <td><?php echo $row["drug_given_by"]; ?></td>
                                                                                <td><?php echo $row["drug_status"]; ?></td>
                                                                                <td class='btn-group btn-group-justified'>
                                                                                    <a href='drug_given.php?add_medication=<?php echo $row["id"]; ?>' class='badge bg-primary'>Proceed</a>
                                                                                </td>
                                                                            </tr>
                                                                            <?php
                                                                        }
                                                                    } else {
                                                                        echo "<tr><td colspan='9' class='text-center'>No patients found</td></tr>";
                                                                    }

                                                                    // Close the database connection
                                                                    $mysqli->close();
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Bootstrap JS -->
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

                            </body>
                            </html>


                        <?php } elseif ($prof === 'Medical Laboratory Scientist') { ?>
                            <div class="col-md-3">
                            <div class="card text-dark flex-fill">
                                    <div class="card-body text-center">
                                    <div class="h1 mb-3">
                                        <img src="img/laboratory.png" alt="Outpatient" class="icon-image">
                                    </div>
                                        <h3 class="card-title mb-3 text-primary">Laboratory</h3>
                                        <a href="laboratory.php" class="btn btn-primary">Proceed</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                            <div class="card text-dark flex-fill">
                                <div class="card-body text-center">
                                <div class="h1 mb-3">
                                    <img src="img/x-ray.png" alt="Outpatient" class="icon-image">
                                </div>
                                    <h3 class="card-title mb-3 text-primary">Radiology</h3>
                                    <a href="radiology.php" class="btn btn-primary">Proceed</a>
                                </div>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="card text-dark flex-fill">
                                <div class="card-body text-center">
                                    <div class="h1 mb-3">
                                        <img src="img/blood-test.png" alt="Outpatient" class="icon-image">
                                    </div>
                                    <h3 class="card-title mb-3 text-primary">HIV/AIDS</h3>
                                    <a href="hiv_test.php" class="btn btn-primary">Proceed</a>
                                </div>
                            </div>
                        </div>
                            <!-- Accountant and roles routing  -->
                        <?php } elseif ($prof === 'Accountant') { 
                             if ($role === 'Pharmacist') {?>
                           
                            <div class="col-md-6">
                                <div class="card text-dark flex-fill">
                                    <div class="card-body text-center">
                                        <div class="h1 mb-3">
                                            <img src="img/accounting.png" alt="Outpatient" class="icon-image">
                                        </div>
                                        <h3 class="card-title mb-3 text-primary">Finance</h3>
                                        <a href="finance.php" class="btn btn-primary">Proceed</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6" >
                                <div class="card text-dark flex-fill">
                                    <div class="card-body text-center">
                                        <div class="h1 mb-3">
                                            <img src="img/pharmacy.png" alt="Outpatient" class="icon-image">
                                        </div>
                                        <h3 class="card-title mb-3 text-primary">Pharmacy</h3>
                                        <a href="pharmacy.php" class="btn btn-primary">Proceed</a>
                                    </div>
                                </div>
                            </div>


                        <?php
                    } elseif ($role === 'Nurse'){ ?>
                        <div class="col-md-4">
                        <div class="card text-dark flex-fill">
                            <div class="card-body text-center">
                                <div class="h1 mb-3">
                                    <img src="img/accounting.png" alt="Outpatient" class="icon-image">
                                </div>
                                <h3 class="card-title mb-3 text-primary">Finance</h3>
                                <a href="finance.php" class="btn btn-primary">Proceed</a>
                            </div>
                        </div>
                    </div>
                        <div class="col-md-4">
                            <div class="card text-dark flex-fill">
                                <div class="card-body text-center">
                                    <div class="h1 mb-3">
                                        <img src="img/blood-test.png" alt="Outpatient" class="icon-image">
                                    </div>
                                    <h3 class="card-title mb-3 text-primary">Registration</h3>
                                    <a href="patient_list_user.php" class="btn btn-primary">Proceed</a>
                                </div>
                            </div>
                        </div>
                            
                            <div class="col-md-4">
                                <div class="card text-dark flex-fill">
                                    <div class="card-body text-center">
                                        <div class="h1 mb-3">
                                            <img src="img/advice.png" alt="Outpatient" class="icon-image">
                                        </div>
                                        <h3 class="card-title mb-3 text-primary">Outpatient</h3>
                                        <a href="patient_list_user.php" class="btn btn-primary">Proceed</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-dark flex-fill">
                                    <div class="card-body text-center">
                                        <div class="h1 mb-3">
                                            <img src="img/doctor1.png" alt="Outpatient" class="icon-image">
                                        </div>
                                        <h3 class="card-title mb-3 text-primary">Inpatients</h3>
                                        <a href="inpatient.php" class="btn btn-primary">Proceed</a>
                                    </div>
                                </div>
                            </div>

                        
                        <div class="col-md-4">
                            <div class="card text-dark flex-fill">
                                <div class="card-body text-center">
                                    <div class="h1 mb-3">
                                        <img src="img/blood-test.png" alt="Outpatient" class="icon-image">
                                    </div>
                                    <h3 class="card-title mb-3 text-primary">HIV/AIDS</h3>
                                    <a href="hiv_test.php" class="btn btn-primary">Proceed</a>
                                </div>
                            </div>
                        </div>
                       

                            <div class="col-md-4">
                                <div class="card text-dark flex-fill">
                                    <div class="card-body text-center">
                                        <div class="h1 mb-3">
                                            <img src="img/consultation.png" alt="Outpatient" class="icon-image">
                                        </div>
                                        <h3 class="card-title mb-3 text-primary">Counseling</h3>
                                        <a href="consultant_list.php" class="btn btn-primary">Proceed</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-dark flex-fill">
                                    <div class="card-body text-center">
                                        <div class="h1 mb-3">
                                            <img src="img/pregnant.png" alt="Outpatient" class="icon-image">
                                        </div>
                                        <h3 class="card-title mb-3 text-primary">Antenatal Care</h3>
                                        <a href="antenatal_display.php" class="btn btn-primary">Proceed</a>
                                    </div>
                                </div>
                            </div>
                            

                   <?php } 
                     elseif ($role === 'Doctor'){ ?>
                        <div class="col-md-4">
                        <div class="card text-dark flex-fill">
                            <div class="card-body text-center">
                                <div class="h1 mb-3">
                                    <img src="img/accounting.png" alt="Outpatient" class="icon-image">
                                </div>
                                <h3 class="card-title mb-3 text-primary">Finance</h3>
                                <a href="finance.php" class="btn btn-primary">Proceed</a>
                            </div>
                        </div>
                    </div>
                        <div class="col-md-4">
                        <div class="card text-dark">
                        
                            <div class="card-body text-center">
                            <div class="h1 mb-3">
                                    <img src="img/doctor.png" alt="Outpatient" class="icon-image">
                                </div>
                                <h3 class="card-title mb-3 text-primary">Appointments</h3>
                                <a href="view_appointment.php" class="btn btn-primary">Proceed</a>               
                            </div>
                        </div>
                    </div>
    
                    <div class="col-md-4">
                        <div class="card text-dark flex-fill">
                            <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <img src="img/x-ray.png" alt="Outpatient" class="icon-image">
                            </div>
                                <h3 class="card-title mb-3 text-primary">Radiology</h3>
                                <a href="radiology.php" class="btn btn-primary">Proceed</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                            <div class="card text-dark flex-fill">
                                    <div class="card-body text-center">
                                    <div class="h1 mb-3">
                                        <img src="img/laboratory.png" alt="Outpatient" class="icon-image">
                                    </div>
                                        <h3 class="card-title mb-3 text-primary">Laboratory</h3>
                                        <a href="laboratory.php" class="btn btn-primary">Proceed</a>
                                    </div>
                                </div>
                            </div>
    
                    <div class="col-md-4">
                        <div class="card text-dark flex-fill">
                            <div class="card-body text-center">
                                <div class="h1 mb-3">
                                    <img src="img/advice.png" alt="Outpatient" class="icon-image">
                                </div>
                                <h3 class="card-title mb-3 text-primary">Outpatient</h3>
                                <a href="patient_list_user.php" class="btn btn-primary">Proceed</a>
                            </div>
                        </div>
                    </div>
                   <?php  }
                    elseif ($role === 'Admin'){ ?>
                        <div class="col-md-4">
                        <div class="card text-dark flex-fill">
                            <div class="card-body text-center">
                                <div class="h1 mb-3">
                                    <img src="img/accounting.png" alt="Outpatient" class="icon-image">
                                </div>
                                <h3 class="card-title mb-3 text-primary">Finance</h3>
                                <a href="finance.php" class="btn btn-primary">Proceed</a>
                            </div>
                        </div>
                    </div>
        
                <div class="col-md-4">
                    <div class="card text-dark">
                    
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                            <img src="img/file.png" alt="Outpatient" class="icon-image">
                            </div>
                            <h3 class="card-title mb-3 text-primary">Patient Records</h3>
                            <a href="admin_reg.php" class="btn btn-primary">Proceed</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-dark">
                    
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                            <img src="img/crowd.png" alt="Outpatient" class="icon-image">
                            </div>
                            <h3 class="card-title mb-3 text-primary">System Users</h3>
                            <a href="user_list.php" class="btn btn-primary">Proceed</a>
                        </div>
                    </div>
                   <?php }
                    else{ ?>
                        <div class="col-md-6">
                        <div class="card text-dark flex-fill">
                            <div class="card-body text-center">
                                <div class="h1 mb-3">
                                    <img src="img/accounting.png" alt="Outpatient" class="icon-image">
                                </div>
                                <h3 class="card-title mb-3 text-primary">Finance</h3>
                                <a href="finance.php" class="btn btn-primary">Proceed</a>
                            </div>
                        </div>
                    </div>
                      <!-- End of Accountant and roles routing  -->
                       <?php }
                    }
                
            }
            elseif ($usertype === 'Doctor') { 
                 if ($role === 'Admin'){ ?>
                  <!--IF user is doctor with admin role -->
                    <div class="col-md-4">
                    <div class="card text-dark">
                    
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                            <img src="img/file.png" alt="Outpatient" class="icon-image">
                            </div>
                            <h3 class="card-title mb-3 text-primary">Financial Records</h3>
                        
                                <a href="finance.php" class="btn btn-primary">Proceed</a>                    
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-dark">
                    
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                            <img src="img/file.png" alt="Outpatient" class="icon-image">
                            </div>
                            <h3 class="card-title mb-3 text-primary">Patient Records</h3>
                           
                            <a href="admin_reg.php" class="btn btn-primary">finance.php</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-dark">
                    
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                            <img src="img/crowd.png" alt="Outpatient" class="icon-image">
                            </div>
                            <h3 class="card-title mb-3 text-primary">System Users</h3>
                            <a href="user_list.php" class="btn btn-primary">Proceed</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                <div class="card text-dark">
                
                    <div class="card-body text-center">
                    <div class="h1 mb-3">
                            <img src="img/doctor.png" alt="Outpatient" class="icon-image">
                        </div>
                        <h3 class="card-title mb-3 text-primary">Appointments</h3>
                        <a href="view_appointment.php" class="btn btn-primary">Proceed</a>               
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-dark flex-fill">
                    <div class="card-body text-center">
                    <div class="h1 mb-3">
                        <img src="img/x-ray.png" alt="Outpatient" class="icon-image">
                    </div>
                        <h3 class="card-title mb-3 text-primary">Radiology</h3>
                        <a href="radiology.php" class="btn btn-primary">Proceed</a>
                    </div>
                </div>
            </div>
        <div class="col-md-4">
                    <div class="card text-dark flex-fill">
                            <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <img src="img/laboratory.png" alt="Outpatient" class="icon-image">
                            </div>
                                <h3 class="card-title mb-3 text-primary">Laboratory</h3>
                                <a href="laboratory.php" class="btn btn-primary">Proceed</a>
                            </div>
                        </div>
                    </div>

            <div class="col-md-4">
                <div class="card text-dark flex-fill">
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                            <img src="img/advice.png" alt="Outpatient" class="icon-image">
                        </div>
                        <h3 class="card-title mb-3 text-primary">Outpatient</h3>
                        <a href="patient_list_user.php" class="btn btn-primary">Proceed</a>
                    </div>
                </div>

                <?php } 
                 if ($role === 'Pharmacist'){ ?>
                    <!--IF user is doctor with pharmacy role --> 
                            <div class="col-md-4" >
                                <div class="card text-dark flex-fill">
                                    <div class="card-body text-center">
                                        <div class="h1 mb-3">
                                            <img src="img/pharmacy.png" alt="Outpatient" class="icon-image">
                                        </div>
                                        <h3 class="card-title mb-3 text-primary">Pharmacy</h3>
                                        <a href="pharmacy.php" class="btn btn-primary">Proceed</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card text-dark flex-fill">
                                    <div class="card-body text-center">
                                        <div class="h1 mb-3">
                                            <img src="img/advice.png" alt="Outpatient" class="icon-image">
                                        </div>
                                        <h3 class="card-title mb-3 text-primary">Patient List</h3>
                                        <a href="patient_list_user.php" class="btn btn-primary">Proceed</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="card text-dark flex-fill">
                                    <div class="card-body text-center">
                                        <div class="h1 mb-3">
                                        <img src="img/doctor.png" alt="Outpatient" class="icon-image">
                                        </div>
                                        <h3 class="card-title mb-3 text-primary">Appointments</h3>
                                        <a href="view_appointment.php" class="btn btn-primary">Proceed</a>  
                                    </div>
                                </div>
                            </div>

              <div class="col-md-4">
                  <div class="card text-dark flex-fill">
                      <div class="card-body text-center">
                      <div class="h1 mb-3">
                          <img src="img/x-ray.png" alt="Outpatient" class="icon-image">
                      </div>
                          <h3 class="card-title mb-3 text-primary">Radiology</h3>
                          <a href="radiology.php" class="btn btn-primary">Proceed</a>
                      </div>
                  </div>
              </div>
          <div class="col-md-4">
                      <div class="card text-dark flex-fill">
                              <div class="card-body text-center">
                              <div class="h1 mb-3">
                                  <img src="img/laboratory.png" alt="Outpatient" class="icon-image">
                              </div>
                                  <h3 class="card-title mb-3 text-primary">Laboratory</h3>
                                  <a href="laboratory.php" class="btn btn-primary">Proceed</a>
                              </div>
                          </div>
                      </div>

  
                  <?php } 
                else{?>
            <!--IF user is doctor without any role -->

                <div class="col-md-4">
                <div class="card text-dark">
                
                    <div class="card-body text-center">
                    <div class="h1 mb-3">
                            <img src="img/doctor.png" alt="Outpatient" class="icon-image">
                        </div>
                        <h3 class="card-title mb-3 text-primary">Appointments</h3>
                        <a href="view_appointment.php" class="btn btn-primary">Proceed</a>               
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-dark flex-fill">
                    <div class="card-body text-center">
                    <div class="h1 mb-3">
                        <img src="img/x-ray.png" alt="Outpatient" class="icon-image">
                    </div>
                        <h3 class="card-title mb-3 text-primary">Radiology</h3>
                        <a href="radiology.php" class="btn btn-primary">Proceed</a>
                    </div>
                </div>
            </div>
        <div class="col-md-4">
                    <div class="card text-dark flex-fill">
                            <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <img src="img/laboratory.png" alt="Outpatient" class="icon-image">
                            </div>
                                <h3 class="card-title mb-3 text-primary">Laboratory</h3>
                                <a href="laboratory.php" class="btn btn-primary">Proceed</a>
                            </div>
                        </div>
                    </div>

            <div class="col-md-4">
                <div class="card text-dark flex-fill">
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                            <img src="img/advice.png" alt="Outpatient" class="icon-image">
                        </div>
                        <h3 class="card-title mb-3 text-primary">Outpatient</h3>
                        <a href="patient_list_user.php" class="btn btn-primary">Proceed</a>
                    </div>
                </div>
          <?php
                }
            }
            else { ?>
                               <div class="col-md-4">
                        <div class="card text-dark flex-fill">
                            <div class="card-body text-center">
                                <div class="h1 mb-3">
                                    <img src="img/accounting.png" alt="Outpatient" class="icon-image">
                                </div>
                                <h3 class="card-title mb-3 text-primary">Finance</h3>
                                <a href="finance.php" class="btn btn-primary">Proceed</a>
                            </div>
                        </div>
                    </div>
            <div class="col-md-4">
                <div class="card text-dark">
                
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                        <img src="img/file.png" alt="Outpatient" class="icon-image">
                        </div>
                        <h3 class="card-title mb-3 text-primary">Patient Records</h3>
                       
                        <a href="patient_list_user.php" class="btn btn-primary">Proceed</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-dark">
                
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                        <img src="img/crowd.png" alt="Outpatient" class="icon-image">
                        </div>
                        <h3 class="card-title mb-3 text-primary">System Users</h3>
                        <a href="user_list.php" class="btn btn-primary">Proceed</a>
                    </div>
                </div>
            </div>

           <?php }
                     ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
   
</body>

</html>

<?php
} else {
    header("Location: home.php");
    exit();
}
?>
