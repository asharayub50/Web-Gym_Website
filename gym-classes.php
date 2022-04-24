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
                    <li class="nav-item mx-3"><a class="nav-link active" href="#">CLASSES</a></li>
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





                        <h1>CLASSES AVAILABLE</h1>

                        <!-- <input class="" name="username" type="text" placeholder="User Name" id="username"><br>
                            <input class="" name="address" type="text" placeholder="Address" id="address"><br>
                            <button type="submit" name="adminEditUser">Edit Info</button> -->

                        <?php include('view-all-classes.php'); ?>

                        <div class="row justify-content-center">



                            <!-- If the user is not admin -->

                            <?php if ($_SESSION['isadmin'] == 0) :  ?>
                                <table class="table">

                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Trainer</th>
                                            <th>Time</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <?php
                                    while ($row = $gymClasses->fetch_assoc()) : ?>

                                        <tr>

                                            <td><?php echo $row['name'];  ?></td>
                                            <td><?php echo $row['trainer'];  ?></td>
                                            <td><?php echo $row['time'];  ?></td>
                                            <td><?php echo $row['description'];  ?></td>
                                            <td><a href="gym-classes.php?userJoinClass=<?php echo $row['id'];  ?> " class="btn px-1">Join</a></td>
                                            


                                        </tr>

                                    <?php
                                    endwhile ?>

                                </table>

                                <h1>Joined Classes</h1>

                                <?php  include('view-all-memberships.php')  ?>

                                <table class="table">

                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Trainer</th>
                                            <th>Time</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <?php
                                    while ($row = $gymMembershipsuser->fetch_assoc()) : ?>

                                    

                                        <?php include('fetch-gymclass-from-id.php'); ?>

                                        

                                        <tr>

                                            <td><?php echo $gymClassData['name'];  ?></td>
                                            <td><?php echo $gymClassData['trainer'];  ?></td>
                                            <td><?php echo $gymClassData['time'];  ?></td>
                                            <td><?php echo $gymClassData['description'];  ?></td>
                                            <td><a href="gym-classes.php?userLeaveClass=<?php echo $gymClassData['id'];  ?> " class="btn px-1">Leave</a></td>
                                            


                                        </tr>

                                    <?php
                                    endwhile ?>

                                </table>




                            <?php endif ?>
                        </div>




                        <div class="row justify-content-center">

                            <!-- If the user is admin -->
                            <?php if ($_SESSION['isadmin'] == 1) :  ?>
                                <table class="table">

                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Trainer</th>
                                            <th>Time</th>
                                            <th>Description</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </thead>

                                    <?php
                                    while ($row = $gymClasses->fetch_assoc()) : ?>

                                        <tr>

                                            <td><?php echo $row['name'];  ?></td>
                                            <td><?php echo $row['trainer'];  ?></td>
                                            <td><?php echo $row['time'];  ?></td>
                                            <td><?php echo $row['description'];  ?></td>
                                            <td>
                                                <a href="gym-classes.php?adminEditClass=<?php echo $row['name'];  ?> " class="btn px-1">Edit</a>
                                                <a href="gym-classes.php?adminDeleteClass=<?php echo $row['id'];  ?>" class="btn px-1">Delete</a>
                                            </td>




                                        </tr>

                                    <?php
                                    endwhile ?>

                                </table>

                                <form id="form" class="signup-form" method="POST" action="gym-classes.php">

                                    <input name="name" type="text" placeholder="name" id="name"><br>
                                    <input name="trainer" type="text" placeholder="trainer" id="trainer"><br>
                                    <input name="time" type="text" placeholder="time" id="time"><br>
                                    <input name="description" type="text" placeholder="description" id="description"><br>
                                    <button type="submit" name="adminAddGymClass">Add Class</button>

                                </form>



                            <?php endif ?>


                        </div>








                    </div>
                </div>

            </div>
        </div>

    </section>


    <!-- acknowledge login and clear success variable -->









</body>

</html>