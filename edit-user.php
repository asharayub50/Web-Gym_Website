<?php

include('server.php');
// echo "server is attached";

//if user is not logged in, this page can't be accessed
if (empty($_SESSION['username'])) {
    header('location: login.php');
}

//if we want to avoid error after updating without going back to home page, initiate the 'profile' section of server here
//so it can refresh values with new username in the session

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
                    if(count($errors) != 0){
                        include('errors.php');
                    }
                    
                    ?>


                    <form class="edit-form" method="POST" action="edit-user.php">
                        <h1 class="form-label-lg">Edit Your Profile:</h1>
                        <p class="form-label" for="username">Username:</p>
                        <input name="username" type="text" placeholder="User Name" id="username" value="">
                        <!-- <p class="form-label" for="email">Email:</p>
                        <input name="email" type="email" placeholder="Email" id="email" value="">
                        <p class="form-label" for="phone">Phone Number:</p>
                        <input name="phone" type="text" placeholder="Phone Number" id="phone" value=""> -->
                        <p class="form-label" for="address">Address:</p>
                        <input name="address" type="text" placeholder="Address" id="address" value="">

                        <button type="submit" name="edit">Save Changes</button>



                        
                        <!-- <a href="change-password.php" style="color: white;"><div class="btn">Change Password</div></a> -->
                        <div class="btn"><a href="change-password.php" style="color: white;">Change Password</a></div>



                        <p class="form-label" for="address">Delete Account:</p>
                        <div class="error">THIS WILL PERMANENTLY DISABLE YOUR ACCOUNT</div>

                        <button type="submit" name="" id="delete-account">DELETE ACCOUNT</button>

                        <!-- <script>
                            var del = document.getElementById("delete").value;
                            if (del.localeCompare("DELETE") == 0)  {
                                document.getElementById("delete-account").name =
                            }

                        </script> -->



                        

                        <!-- <p class="message">Already Registered<a href="login.php">Log In</a></p> -->

                    </form>

                </div>
            </div>
        </section>
    </section>
    <br>





</body>

</html>