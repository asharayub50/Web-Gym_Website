<?php

include('server.php');

?>












<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/plugins/lightbox2-2.11.1/dist/css/lightbox.min.css">
    <link rel="stylesheet" href="assets/css/style.css">


    <!-- <script src="assets/js/form-validation.js"></script> -->
    <!-- <script src="./assets/js/form-validation.js"></script> -->
</head>

<body>




    <!-- LogIn -->

    <section id="register">
        <section class="Login-section">

            <div class="login-page">
                <div class="form">
                    <!-- displaying validation errors -->

                    <?php include('errors.php'); ?>

                    <div class="error" id="errors"></div>
                    
                    <form id="form" class="signup-form" method="POST" action="signup.php">
                        <p class="form-label">Username:</p>
                        <input name="username" type="text" placeholder="User Name" id="username">
                        <p class="form-label">Password:</p>
                        <input name="password" type="password" placeholder="Password" id="password">
                        <p class="form-label">Confirm Password:</p>
                        <input name="confirmp" type="password" placeholder="Confirm Password" id="confirmp">
                        <p class="form-label">Email:</p>
                        <input name="email" type="email" placeholder="Email" id="email">
                        <p class="form-label">Phone Number:</p>
                        <input name="phone" type="text" placeholder="Phone Number" id="phone">
                        <p class="form-label">Address:</p>
                        <input name="address" type="text" placeholder="Address" id="address">

                        <button type="submit" name="signup">Sign Up</button>

                        <p class="message">Already Registered <a href="login.php">Log In</a></p>

                    </form>

                </div>
            </div>
        </section>
    </section>
    <br>




    <script src="./assets/js/form-validation.js"></script>


</body>

</html>