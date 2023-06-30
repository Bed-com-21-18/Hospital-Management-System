<?php
if (isset($_SESSION['id']) && isset($_SESSION['uname'])){
  include "comfig.php";
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <title>Patients List</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Responsive meta tag -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
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
  <body style ="margin-top :200">
    <div class="container">
      <div class="collapse navbar-collapse" id="navmenu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">
            <!-- search -->
            <input class="form-control me-1" id="myInput" style="width:100%; max-width:20rem" type="text" placeholder="Search" aria-label="Search">             
          </li>
        </ul>
      </div>
      
      <?php
      // Calculate the sum of the total_bills column
      $sumQuery = "SELECT SUM(total_bills) AS total_sum FROM patient";
      $sumResult = $mysqli->query($sumQuery);
      $sumRow = $sumResult->fetch_assoc();
      $totalSum = $sumRow['total_sum'];
      ?>

      <h4 class="mt-4">Total Bill: <?php echo $totalSum; ?></h4>

      <table class="table table-bordered bg-light" id='myInput'>
        <thead class="thead-light">
          <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Sex</th>
            <th>Location</th>
            <th>Occupation</th>
            <th>Total Bill</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          <?php
          // Retrieve all patients from the patient table sorted by the prescribed_on date
          $sql = "SELECT * FROM patient WHERE total_bills != 0 ORDER BY id DESC";
          $result = $mysqli->query($sql);

          // Display patient information in table rows
          if ($result->num_rows > 0) {
            $currentMonth = '';
            $currentWeek = '';
            $weekCounter = 1;
            while ($row = $result->fetch_assoc()) { 
              $date = $row["prescribed_on"];
              $month = date('F Y', strtotime($date));
              $week = ceil(date('j', strtotime($date)) / 7.5); // Calculate week number based on days in the month

              // Check if the month or week has changed
              if ($currentMonth != $month || $currentWeek != $week) {
                echo "<tr><td colspan='9' class='text-center bg-light text-primary'>$month, Week $week</td></tr>";
                $currentMonth = $month;
                $currentWeek = $week;
                $weekCounter = 1;
              }

              ?>
              <tr>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["age"]; ?></td>
                <td><?php echo $row["gender"]; ?></td>
                <td><?php echo $row["address"]; ?></td>
                <td><?php echo $row["occupation"]; ?></td>
                <td><?php echo $row["total_bills"]; ?></td>
                <td><?php echo $row["status"]; ?></td>
                <td class='btn-group btn-group-justified'>                                    
                  <a href='finance_status.php?add_status=<?php echo $row["id"]; ?>' class='badge bg-primary'>Clear Balance</a>
                </td>
              </tr>
              <?php
              $weekCounter++;
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

  <!-- Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
  </html>
  <?php 
}else {
  header("Location: home.php");
  exit();
}
?>
