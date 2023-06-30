<?php 
    include 'user_regdb.php';
    if (isset($_SESSION['id']) && isset($_SESSION['uname'])){
    include "unavbar.php";
    include 'comfig.php';
    include "antenatal.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset= "UTF-8">
<meta name="author" content="Matilda">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Hospital Management System</title>
<link rel= "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

<!-- <link rel="stylesheet" href="home.css"/> -->
</head>
<body>
<div class="container p-4">
    <?php
    if(isset($_GET['view'])){
        $id = $_GET['view'];
        $sql = "SELECT * FROM antenatal WHERE id='$id'";
        $sults = $mysqli ->query($sql);
        $row =$sults->fetch_assoc();
        
        $full_name = $row['full_name'];
        $age = $row['age'];
        $gender = $row['gender'];


    }
    ?>
    <div class="container">
            <table class="table table-hover" style="overflow:auto">
                <thead class="table table-hover">
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Sex</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody id="myTable">
                    <tr>
                        <td><?php echo $row['full_name']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <!-- <td class="btn-group btn-group-justified">
                            <a href="view_history.php?history=<?php echo $row["id"]; ?>" class="badge text-light bg-secondary">Previous History</a>
                        </td> -->
                    </tr>
                </tbody>
            </table>
        </div>


<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form method="post" action="antenatal_results.php" class="border p-3 rounded">
          <h1 class="mb-3 text-center"><i class="fas fa-calendar-plus"></i> TTV Status Update</h1>
          <?php if(isset($_SESSION['success_message'])) { ?>
          <div class="alert alert-success" role="alert">
            <?php echo $_SESSION['success_message']; ?>
          </div>
          <?php unset($_SESSION['success_message']); } ?>
          <?php if(isset($_SESSION['error_message'])) { ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['error_message']; ?>
          </div>
          <?php unset($_SESSION['error_message']); } ?>

          <div class="mb-3">
          <label for="name" class="form-label"><i class="fas fa-user"></i> Date</label>
          <input type="date" class="form-control" value="" name="date">
          </div>
          <div class="mb-3">
            <label  for="status" class="form-label"><i class="fas fa-comment-medical"></i>TTV</label>
            <!-- <input name="test" id="test" rows="2" required class="form-control"></input> -->
            <select name="ttv[]" class="form-select" required>
                                        <option value="Temperature">TTV 1</option>
                                        <option value="Pulse rate">TTV 2</option>
                                        <option value="Respiratory rate">TTV 3</option>
                                        <option value="Blood pressure">TTV 4</option>
                                        <option value="Blood pressure">TTV 5</option>

                                    </select>
          </div>
          <div class="mb-3">
            <label  for="status" class="form-label"><i class="fas fa-comment-medical"></i>Status</label>
            <input name="test" id="test" rows="2" required class="form-control"></input>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-2m8WY5ch5vHVp5CmI/CIZM8hBE+1cuaJ/+fVZdHEkQ2jDlmzOJLv1x0xZWxxTy2C31Nfk9UZKO6UZT6wq3JgWw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js" integrity="sha512-FgvcWWtB4ax+j4eJ7V10zykOuPG5b5TX00S/PrCUYX9v+q3qlJZmMYhF+RbL15Hz2+e7VJz1mcuVTYR8J0QcmQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>


</body>


<?php 
    } else{
        header('Location: home.php');
        exit();
    }