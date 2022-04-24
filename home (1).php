<?php

include('server.php');

//if user is not logged in, they can't access this page
if (empty($_SESSION['username'])) {
    header('location: login.php');
}


?>












<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="assests/css/all.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assests/css/bootstrap.min.css">
    <link rel="stylesheet" href="assests/plugins/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assests/plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assests/plugins/lightbox2-2.11.1/dist/css/lightbox.min.css">
    <link rel="stylesheet" href="assests/css/style.css">
</head>

<body>

    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky py-0 m-0">
        <div class="container-fluid">
            <a class="navbar-brand mx-4" href="#"><img class="img-fluid" src="./assests/images/gym_logo.png" alt="logo" width="50" height="50"></a>

            <!-- print the user's usename -->
            <?php if (isset($_SESSION["username"])) : ?>
                <p class="nav-item m-0 p-0">WELCOME, <strong> <?php echo $_SESSION['username']; ?></strong></p>
            <?php endif ?>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ">
                    <li class="nav-item mx-3"><a class="nav-link active" href="#">HOME</a></li>
                    <li class="nav-item mx-3"><a class="nav-link active" href="#">TRAINERS</a></li>
                    <li class="nav-item mx-3"><a class="nav-link active" href="#">SCHEDULE</a></li>
                    <li class="nav-item mx-3"><a class="nav-link active" href="#">PLANS</a></li>
                    <li class="nav-item mx-3"><a class="nav-link active" href="edit-user.php?profile='1'">PROFILE</a></li>
                    <li class="nav-item mx-3"><a class="nav-link active" href="home.php?logout='1'">LOGOUT</a></li>

                </ul>
            </div>
        </div>
    </nav>


    <!-- acknowledge login and clear success variable -->
    <?php if (isset($_SESSION['success'])) : ?>
        <!-- <div>
            <h1>
                <?php
                // echo $_SESSION['success'];
                // unset($_SESSION['success']);
                ?>
            </h1>
        </div> -->
    <?php endif ?>



    <!-- Main Content -->
    <section class="main p-0 m-0">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12  p-0 m-0">

                    <img class="img-fluid" src="./assests/images/join-gym3.jpg" alt="logo">

                </div>

            </div>

        </div>
    </section>




</body>

</html>