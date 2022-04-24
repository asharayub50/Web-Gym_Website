<?php

//starting session
session_start();
//errors array
$errors = array();

$username = '';
$address = '';







//connect to database
$db = mysqli_connect('localhost', 'root', '', 'gym-database');

if (!$db) {
    die("connection to this database failed due to" . mysqli_connect_error());
}
// echo "Success connecting to the Database";












//CREATE
//when the register button is clicked
//signing user up
if (isset($_POST['signup'])) {

    //reading values from post
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $confirmp = mysqli_real_escape_string($db, $_POST['confirmp']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $address = mysqli_real_escape_string($db, $_POST['address']);

    $query = "SELECT username FROM users WHERE username='$username'";
    $usernameCheck = mysqli_query($db, $query);


    $query = "SELECT email FROM users WHERE email='$email'";
    $emailCheck = mysqli_query($db, $query);

    $query = "SELECT phone FROM users WHERE phone='$phone'";
    $phoneCheck = mysqli_query($db, $query);


    $phoneCheck = mysqli_fetch_assoc($phoneCheck);
    $usernameCheck = mysqli_fetch_assoc($usernameCheck);
    $emailCheck = mysqli_fetch_assoc($emailCheck);



    if (!(empty($usernameCheck))) {
        array_push($errors, "username already exists");
    }
    if (!(empty($emailCheck))) {
        array_push($errors, "email already exists");
    }
    if (!(empty($phoneCheck))) {
        array_push($errors, "phone number already exists");
    }




    //save user to database if there are no errors
    if (count($errors) == 0) {
        //encrypting password 
        $password = md5($password);
        $sql = "INSERT INTO users (username, password, email, phone, address) 
            VALUES ('$username', '$password', '$email', '$phone', '$address')";

        mysqli_query($db, $sql);

        $query = "SELECT * FROM users WHERE username='$username'";
        $userId = mysqli_query($db, $query);
        $userId = mysqli_fetch_assoc($userId);
        $userId = $userId['id'];


        $_SESSION['isadmin'] = $isadmin;
        $_SESSION['userid'] = $userId;
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "Logged In!";

        //redirecting to home page
        header('location: home.php');
    }
}
















//When login button is clicked
//login from login page
if (isset($_POST['login'])) {
    //reading values from post
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);


    //to check if form fields are filled
    //adding errors in error array
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        //encrypting password before comparing
        $password = md5($password);
        //make and pass the query
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($db, $query);






        $query = "SELECT isadmin FROM users WHERE username='$username'";
        $isadmin = mysqli_query($db, $query);
        $isadmin = mysqli_fetch_assoc($isadmin);
        $isadmin = $isadmin['isadmin'];





        if (mysqli_num_rows($result) == 1) {
            //log user in 

            $query = "SELECT * FROM users WHERE username='$username'";
            $userId = mysqli_query($db, $query);
            $userId = mysqli_fetch_assoc($userId);
            $userId = $userId['id'];



            $_SESSION['isadmin'] = $isadmin;
            $_SESSION['username'] = $username;
            $_SESSION['userid'] = $userId;
            $_SESSION['success'] = "Logged In!";

            //redirecting to home page
            header('location: home.php');
        } else {
            array_push($errors, "The username or password is not correct");
            // header('location: login.php');
        }
    }
}



















//READ
//when profile button is pressed, showing user info
if (isset($_GET['profile'])) {
    // echo "in the profile function";
    $username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($db, $query);

    $result = mysqli_fetch_assoc($result);
}















//UPDATE
//updating user data when save changes button is pressed
if (isset($_POST['edit'])) {


    //current username to update data
    $currentUsername = $_SESSION['username'];


    //reading values from post
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $address = mysqli_real_escape_string($db, $_POST['address']);


    //getting values to avoid duplication
    $query = "SELECT username FROM users WHERE username='$username'";
    $usernameCheck = mysqli_query($db, $query);

    $usernameCheck = mysqli_fetch_assoc($usernameCheck);



    //to check if form fields are filled
    //adding errors in error array
    if (empty($username)) {
        array_push($errors, "username is required");
    }
    if (!(empty($usernameCheck))) {
        array_push($errors, "username already exists");
    }
    if (empty($address)) {
        array_push($errors, "address is required");
    }

    if (count($errors) == 0) {

        $query = "UPDATE users SET username='$username', address='$address' 
        WHERE username='$currentUsername'";
        $_SESSION['username'] = $username;
        $result = mysqli_query($db, $query);

        header('location: home.php');
    }
}















//changing password
if (isset($_POST['changepwd'])) {

    $username = $_SESSION['username'];


    //reading values from post
    $oldPassword = mysqli_real_escape_string($db, $_POST['oldPassword']);
    $newPassword = mysqli_real_escape_string($db, $_POST['newPassword']);
    $confirmp = mysqli_real_escape_string($db, $_POST['confirmp']);


    $query = "SELECT password FROM users WHERE username='$username'";
    $result = mysqli_query($db, $query);

    $result = mysqli_fetch_assoc($result);

    //to check if form fields are filled
    //adding errors in error array
    if (empty($oldPassword)) {
        array_push($errors, "Old Password is required");
    }
    if (md5($oldPassword) != $result['password']) {
        array_push($errors, "Old Password is not correct");
    }
    if (empty($newPassword)) {
        array_push($errors, "New Password is required");
    }
    if (empty($confirmp)) {
        array_push($errors, "Confirm your password");
    }
    if ($newPassword != $confirmp) {
        array_push($errors, "Passwords don't match");
    }


    if (count($errors) == 0) {
        // echo "NOW CHANGING PASSWORD";
        // echo "$newPassword";
        $newPassword = md5($newPassword);
        $query = "UPDATE users SET  password='$newPassword'
            WHERE username='$username'";
        $result = mysqli_query($db, $query);
        header('location: home.php');
    }
}














//DELETE
//deleting user's account
if (isset($_POST['delete'])) {


    $username = $_SESSION['username'];
    $query = "DELETE FROM users WHERE username='$username'";
    $result = mysqli_query($db, $query);



    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}










//admin deleting the user
if (isset($_GET['adminDelete'])) {


    $username = mysqli_real_escape_string($db, $_GET['adminDelete']);
    $query = "DELETE FROM users WHERE username='$username'";
    $delete = mysqli_query($db, $query);
}






//updating the fields for editing by admin
if (isset($_GET['adminEdit'])) {
    // echo "now in edit";

    $username = mysqli_real_escape_string($db, $_GET['adminEdit']);
    $query = "SELECT * FROM users WHERE username='$username'";
    $update = mysqli_query($db, $query);

    $update = mysqli_fetch_assoc($update);
    $usernname = $update['username'];
    $address = $update['address'];
}



//editing user details by admin
if (isset($_POST['adminEditUser'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $address = mysqli_real_escape_string($db, $_POST['address']);




    $query = "UPDATE users SET username='$username', address='$address' 
        WHERE username='$username'";
    $update = mysqli_query($db, $query);
}






//admin deleting gym class
if (isset($_GET['adminDeleteClass'])) {

    $gymClassId = mysqli_real_escape_string($db, $_GET['adminDeleteClass']);
    $query = "DELETE FROM gymclass WHERE id='$gymClassId'";
    $delete = mysqli_query($db, $query);
}




//admin adding gym class
if (isset($_POST['adminAddGymClass'])) {
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $trainer = mysqli_real_escape_string($db, $_POST['trainer']);
    $time = mysqli_real_escape_string($db, $_POST['time']);
    $description = mysqli_real_escape_string($db, $_POST['description']);


    $query = "INSERT INTO gymclass (name, trainer, time, description) 
            VALUES ('$name', '$trainer', '$time', '$description')";

    $addClass = mysqli_query($db, $query);
}   





//user joining class
if (isset($_GET['userJoinClass'])) {


    $currentUserid = $_SESSION['userid'];


    $gymClassId = mysqli_real_escape_string($db, $_GET['userJoinClass']);

    $query = "INSERT INTO gymmemberships (gymclassid, userid) VALUES ('$gymClassId', '$currentUserid')";
    $addCandidate = mysqli_query($db, $query);
}


//user leaving class
if (isset($_GET['userLeaveClass'])) {
    // echo "now leaving";
    $currentUserid = $_SESSION['userid'];
    // echo "$currentUserid";
    
    $gymClassId = mysqli_real_escape_string($db, $_GET['userLeaveClass']);
    // echo "$gymClassId";

    $query = "DELETE FROM gymmemberships WHERE gymclassid='$gymClassId' AND userid='$currentUserid'";
    $delete = mysqli_query($db, $query);
}





















//When user clicks logout button
//logout
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}









//TODOS: update password, avoid duplication

//function for printing asocc array
    // function pre_r($array)
    // {
    //     // echo "array will be printed now";
    //     echo '<pre>';
    //     print_r($array);
    //     echo '</pre>';
    // }

    // echo "PASSWORDS IS: ";

    // pre_r($result);