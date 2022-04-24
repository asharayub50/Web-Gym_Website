<?php

include('server.php');

?>












<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="assets/css/all.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/plugins/lightbox2-2.11.1/dist/css/lightbox.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>



    <!-- LogIn -->

    <section id="register">
        <section class="Login-section">

            <div class="login-page">
                <div class="form">
                    <!-- displaying validation errors -->

                    <?php include('errors.php'); ?>



                    <form class="login-form" method="POST" action="login.php">
                        <p class="form-label">Username:</p>
                        <input name="username" type="text" placeholder="Username" id="username">
                        <p class="form-label">Password:</p>
                        <input name="password" type="password" placeholder="Password" id="password">

                        <button type="submit" name="login">LogIn</button>

                        <p class="message">Not Registered? <a href="signup.php">Register</a>
                        </p>


                    </form>

                </div>
            </div>
        </section>
    </section>
    <br>




</body>

</html>