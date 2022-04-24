<?php


$query = "SELECT * FROM users WHERE isadmin='0'";
$userData = mysqli_query($db, $query);

// $userData = mysqli_fetch_assoc($userData);



function pre_r($array)
    {
        // echo "array will be printed now";
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }

    // pre_r($userData->fetch_assoc());
    // pre_r($userData->fetch_assoc());





