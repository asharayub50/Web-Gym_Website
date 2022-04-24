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
    <!-- <link rel="stylesheet" href="assets/css/all.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/plugins/lightbox2-2.11.1/dist/css/lightbox.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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






    <!-- Main Content -->
    <section class="main p-0 m-0">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12  p-0 m-0">

                    <img class="img-fluid" src="./assets/images/join-gym3.jpg" alt="logo">
                    <div class="carousel-caption main-content form2">











                        <?php if ($_SESSION['isadmin'] == 0) :    ?>

                            <h1>Welcome Titan Gym Member</h1>
                            <form id="form" class="signup-form" method="#" action="#">



                            </form>

                        <?php endif ?>












                        <!-- IF THE USER IS ADMIN -->
                        <?php if ($_SESSION['isadmin'] == 1) :    ?>

                            <h1>Welcome Titan Gym Admin</h1>
                            <br>

                            <h1>Search</h1>
                            <input type="text" name="userSearch" id="userSearch" placeholder="search for users">

                            <!-- getting all data of users from the database except the admins -->
                            <?php include('view-all-users.php'); ?>

                            <div class="row justify-content-center">

                                <table class="table">

                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </thead>

                                    <?php
                                    while ($row = $userData->fetch_assoc()) : ?>

                                        <tr>

                                            <td><?php echo $row['username'];  ?></td>
                                            <td><?php echo $row['address'];  ?></td>
                                            <td>

                                                <a href="home.php?adminEdit=<?php echo $row['username'];  ?> " class="btn">Edit</a>
                                                <a href="home.php?adminDelete=<?php echo $row['username'];  ?>" class="btn">Delete</a>

                                            </td>


                                        </tr>

                                    <?php
                                    endwhile ?>

                                </table>

                                <script>
                                    // console.log("hello");
                                    $("#userSearch").on("keyup", function() {

                                        var user = $(this).val();

                                        $("table tr").each(function(result) {

                                            if (result !== 0) {
                                                var userr = $(this).find("td:first").text();
                                                // console.log(userr);
                                                if (userr.indexOf(user) !== 0 && userr.toLowerCase().indexOf(user.toLowerCase) < 0) {
                                                    // console.log("hiding row");
                                                    $(this).hide();
                                                } else {
                                                    // console.log("showing row");
                                                    $(this).show();
                                                }
                                            }


                                        });

                                    });
                                </script>


                            </div>

                            <form id="form" class="signup-form" method="POST" action="home.php">

                                <input class="" name="username" type="text" value="<?php echo $username; ?>" placeholder="User Name" id="username"><br>
                                <input class="" name="address" type="text" value="<?php echo $address ?>" placeholder="Address" id="address"><br>
                                <button type="submit" name="adminEditUser">Edit Info</button>

                            </form>




                        <?php endif ?>



                    </div>
                </div>

            </div>

        </div>
    </section>


    <!-- acknowledge login and clear success variable -->









</body>

</html>