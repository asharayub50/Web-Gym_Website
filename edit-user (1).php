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
    <link rel="stylesheet" href="assests/css/bootstrap.min.css">
    <link rel="stylesheet" href="assests/plugins/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assests/plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assests/plugins/lightbox2-2.11.1/dist/css/lightbox.min.css">
    <link rel="stylesheet" href="assests/css/style.css">
</head>

<body>




    <!-- LogIn -->

    <section id="register">
        <section class="Login-section">

            <div class="login-page">
                <div class="form">
                    <!-- displaying validation errors -->

                    <?php
                    include('errors.php');
                    ?>


                    <form class="edit-form" method="POST" action="edit-user.php">
                        <h1 class="form-label">Edit Your Profile:</h1>
                        <input name="username" type="text" placeholder="User Name" id="username" value="<?php echo $result['username'];  ?>">
                        <input name="email" type="email" placeholder="Email" id="email" value="<?php echo $result['email'];  ?>">
                        <input name="phone" type="text" placeholder="Phone Number" id="phone" value="<?php echo $result['phone'];  ?>">
                        <input name="address" type="text" placeholder="Address" id="address" value="<?php echo $result['address'];  ?>">

                        <button type="submit" name="edit">Save Changes</button>


                        <button class="mt-3" type="submit" name="delete">DELETE ACCOUNT</button>

                        <!-- <p class="message">Already Registered<a href="login.php">Log In</a></p> -->

                    </form>

                </div>
            </div>
        </section>
    </section>
    <br>





</body>

</html>