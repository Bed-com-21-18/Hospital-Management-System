<?php 
    include "comfig.php";

    $mode = "Enter email";
    if(isset($_GET['mode'])){
        $mode = $_GET['mode'];
    }
    if(count($_POST) > 0){
        switch($mode){
            case 'enter_email':
                header("Location: forget.php?mode=enter_code");
                exit();
            break;
            case 'enter_code':
                header("Location: forget.php?mode=enter_password");
                exit();
            break;
            case 'enter_password':
                header("Location: admin_login.php");
                exit();
            break;
            default:

            break;
        }
    }
    ?>
    <!doctype html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Hospital Management System</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
            <link rel="stylesheet" href="style.css"/>
        </head>
        <body>
    
         <!-- Navbar -->
         <?php
                include "navbar2.php";
            ?>
            
            <?php
                  switch($mode){
                    case 'enter_email':
                 ?>       
                        <div class="row justify-content-center p-5 bg-light">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-center">FORGET PASSWORD</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="forget.php?mode=enter_email" method="POST">
                                            <div class="form-group mb-3">
                                                <label class="px-2">Enter your email</label>
                                                <input type="email" name="email" class="form-control" placeholder="Email"/>
                                            </div>
                                            <span><a href="admin_login.php" class="text-primary p-4">Login</a></span>
                                            <div class="form-group mb-3 text-center p-2">
                                                <button type="submit" class="btn btn-primary">Next</button>
                                            </div>                                
                                        </form>
                                    </div>
                                </div>
                             </div>
                         </div>
                    <?php 
                    break;
                    case 'enter_code':
                        ?>       
                        <div class="row justify-content-center p-5 bg-light">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-center">FORGET PASSWORD</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="forget.php?mode=enter_code" method="POST">
                                            <div class="form-group mb-3">
                                                <label class="px-2">Enter code sent to your email</label>
                                                <input type="text" name="code" class="form-control" placeholder="12345"/>
                                            </div>
                                            <span><a href="admin_login.php" class="text-primary p-4">Login</a></span>
                                            <div class="form-group mb-3 text-center p-2">
                                                <button type="submit" class="btn btn-primary">Next</button>
                                            </div>                                
                                        </form>
                                    </div>
                                </div>
                             </div>
                         </div>
                    <?php 
                    break;
                    case 'enter_password':
                        ?>       
                        <div class="row justify-content-center p-5 bg-light">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-center">FORGET PASSWORD</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="forget.php?mode=enter_password" method="POST">
                                            <div class="form-group mb-3">
                                                <label class="px-2">Enter your new Password</label>
                                                <input type="password" name="pwd" class="form-control" placeholder="Password"/>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="px-2">Re-enter Password</label>
                                                <input type="password" name="re_pwd" class="form-control" placeholder="Re-enter Password"/>
                                            </div>
                                            <span><a href="admin_login.php" class="text-primary p-4">Login</a></span>
                                            <div class="form-group mb-3 text-center p-2">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>                                
                                        </form>
                                    </div>
                                </div>
                             </div>
                         </div>
                    <?php 
                    break;
                    default:
        
                    break;
                }
            ?>
             <!--Form-->
             <div class="row justify-content-center p-5 bg-light">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-center">FORGET PASSWORD</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="forget.php?mode=enter_email" method="POST">
                                            <div class="form-group mb-3">
                                                <label class="px-2">Enter your email</label>
                                                <input type="email" name="email" class="form-control" placeholder="Email"/>
                                            </div>
                                            <span><a href="admin_login.php" class="text-primary p-4">Login</a></span>
                                            <div class="form-group mb-3 text-center p-2">
                                                <input type="submit" value="Next" class="btn btn-primary">
                                            </div>                                
                                        </form>
                                    </div>
                                </div>
                             </div>
                         </div>
                    
           <!-- footer -->
           <?php
                include "footer.php";
            ?>
    
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        </body>
    </html> 