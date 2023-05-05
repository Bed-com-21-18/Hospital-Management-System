<div class="col-md-8">  
    <h3 class="text-center text-info p-2">
        Patient list 
    </h3>
    <hr>
    <!-- search -->
    <input class="form-control me-1" id="myInput" style="width:100%; max-width:20rem" type="text" placeholder="Search" aria-label="Search">             
    <hr>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Occupation</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // initialize the mysqli object with proper credentials
                    $mysqli = new mysqli("localhost", "root", "", "hms");

                    // check if there is an error in connection
                    if ($mysqli->connect_error) {
                        die("Connection failed: " . $mysqli->connect_error);
                    }

                    // execute the query
                    $sql = "SELECT * FROM patients ORDER BY id DESC";
                    $result = $mysqli->query($sql);

                    // loop through the result set and display the data in a table
                    while($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?= $row['name']; ?></td>
                            <td><?= $row['age']; ?></td>
                            <td><?= $row['gender']; ?></td>
                            <td><?= $row['occupation']; ?></td>
                            <td><?= $row['mobile']; ?></td>
                            <td><?= $row['address']; ?></td>
                            <td class="btn-group btn-group-justified">                                       
                                <a href="delete.php?delete=<?php echo $row['id']; ?>" class="badge bg-danger mx-1" onclick="return confirm('This will be deleted completely?');">Delete</a>
                                <a href="update.php?edit=<?php echo $row['id']; ?>" class="badge bg-success">Edit</a>
                            </td> 
                        </tr>
                <?php
                    }

                    // close the database connection
                    $mysqli->close();
                ?>
            </tbody>
        </table>
    </div>
</div>

