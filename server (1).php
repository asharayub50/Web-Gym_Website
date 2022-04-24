<?php


session_start();
// $username = "";
// $email = "";
//errors array
$errors = array();


//connect to database
$db = mysqli_connect('localhost', 'root', '', 'gym-database');

if (!$db) {
    die("connection to this database failed due to" . mysqli_connect_error());
}
// echo "Success connecting to the Database";


// echo "in the server file";

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


    //to check if form fields are filled
    //adding errors in error array
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if ($password != $confirmp) {
        array_push($errors, "Passwords don't match");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($phone)) {
        array_push($errors, "Phone Number is required");
    }
    if (empty($address)) {
        array_push($errors, "Address is required");
    }


    // echo "POST DATA RECEIVED";

    //save user to database if there are no errors
    if (count($errors) == 0) {
        //encrypting password 
        $password = md5($password);
        $sql = "INSERT INTO users (username, password, email, phone, address) 
            VALUES ('$username', '$password', '$email', '$phone', '$address')";

        mysqli_query($db, $sql);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in!";

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

        if (mysqli_num_rows($result) == 1) {
            //log user in 
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in!";

            //redirecting to home page
            header('location: home.php');
        } else {
            array_push($errors, "The username or password is not correct");
            // header('location: login.php');
        }
    }
}





//When user clicks logout button
//logout
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}





//READ
//when profile button is pressed, showing user info
if (isset($_GET['profile'])) {
    // echo "in the profile function";
    $username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($db, $query);


    function pre_r($array)
    {
        // echo "array will be printed now";
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }

    //printing the result object
    // pre_r($result);

    $result = mysqli_fetch_assoc($result);

    // echo $result['email'];

    // pre_r($result);

}




//UPDATE
//updating user data when save changes button is pressed
if (isset($_POST['edit'])) {

    //current username to update data
    $currentUsername = $_SESSION['username'];



    //reading values from post
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $address = mysqli_real_escape_string($db, $_POST['address']);


    //to check if form fields are filled
    //adding errors in error array
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($phone)) {
        array_push($errors, "Phone Number is required");
    }
    if (empty($address)) {
        array_push($errors, "Address is required");
    }


    $query = "UPDATE users SET username='$username', email='$email', phone='$phone', address='$address' 
        WHERE username='$currentUsername'";
    $_SESSION['username'] = $username;
    $result = mysqli_query($db, $query);

    header('location: home.php');
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












//TODOS: update password, avoid duplication