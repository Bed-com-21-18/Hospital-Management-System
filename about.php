<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hospital Management System</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css"/>
        <link rel="stylesheet" href="bootstrap-5.0.0/css/bootstrap.min.css"/>
    </head>
    <body>

    <!-- Navbar -->
        <?php
            include "navbar2.php";
        ?>
        
    <!--About us-->
    <section class="bg-secondary text-light p-5 text-center text-md-start">
        <div class="container">
            <div class="d-md-flex  align-items-center justify-content-between">
                <div>
                    <h1 class="text-center">
                        <span class="text-warning">ABOUT US</span> 
                    </h1>
                    <hr>
                    <p class="lead my-4">
                    Welcome to our Hospital Management System! Our system is designed to provide a seamless experience for healthcare providers and patients alike. We believe that our commitment to excellence in healthcare delivery sets us apart from other healthcare providers.
                    </p>
                    <p class="lead my-4">
                    Our hospital has a long history of providing quality healthcare to the community. We started as a small clinic and have grown into a full-fledged hospital with state-of-the-art facilities and highly skilled healthcare professionals.</p>
                </div>
                <img class="img-fluid w-50 p-2 d-none d-md-block" src="img/about.jpg" alt="">
            </div>
            
        </div>
        <div class="d-md-flex w-70 align-items-center justify-content-between">
                <div>
                    <h3 class="text-center">
                        <span class="text-warning">Mission Statement</span> 
                    </h3>
                    <hr>
                    <p class="lead my-4">
                    Our mission is to provide patient-centered care, ensuring that every patient who comes through our doors receives the highest level of care possible. We strive to make our patients feel comfortable and confident that they are in good hands.
                    </p>
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