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
    <title>Change Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/plugins/lightbox2-2.11.1/dist/css/lightbox.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>


<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky py-0 m-0">
        <div class="container-fluid">
            <a class="navbar-brand mx-4" href="#"><img class="img-fluid" src="./assets/images/gym_logo.png" alt="logo" width="50" height="50"></a>

            <!-- print the user's usename -->
            <?php if (isset($_SESSION["username"])) : ?>
                <p class="nav-item m-0 p-0">WELCOME, <strong> <?php echo $_SESSION['username']; ?></strong></p>
            <?php endif ?>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ">
                    <li class="nav-item mx-3"><a class="nav-link active" href="home.php">HOME</a></li>
                    <li class="nav-item mx-3"><a class="nav-link active" href="#">TRAINERS</a></li>
                    <li class="nav-item mx-3"><a class="nav-link active" href="#">SCHEDULE</a></li>
                    <li class="nav-item mx-3"><a class="nav-link active" href="gym-classes.php">CLASSES</a></li>
                    <li class="nav-item mx-3"><a class="nav-link active" href="view-user.php?profile='1'">PROFILE</a></li>
                    <li class="nav-item mx-3"><a class="nav-link active" href="home.php?logout='1'">LOGOUT</a></li>

                </ul>
            </div>
        </div>
    </nav>




    <!-- LogIn -->

    <section id="register">
        <section class="Login-section">

            <div class="login-page">
                <div class="form mt-5">
                    <!-- displaying validation errors -->

                    <?php
                    include('errors.php');
                    ?>

                    <form class="signup-form" method="POST" action="change-password.php">
                        <h1 class="form-label-lg">Change Password:</h1>

                        <p class="form-label" for="old-password">Old Password:</p>
                        <input name="oldPassword" type="password" placeholder="Old Password" id="old-password">
                        <p class="form-label" for="new-password">New Password:</p>
                        <input name="newPassword" type="password" placeholder="New Password" id="new-password">
                        <p class="form-label" for="confirm-password">Confirm Password:</p>
                        <input name="confirmp" type="password" placeholder="Confirm New Password" id="confirm-password">

                        <button type="submit" name="changepwd">Change Password</button>

                    </form>

                </div>
            </div>
        </section>
    </section>
    <br>





</body>

</html>