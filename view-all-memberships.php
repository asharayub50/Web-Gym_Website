<?php

$currentUserid = $_SESSION['userid'];


$query = "SELECT * FROM gymmemberships WHERE userid='$currentUserid'";
$gymMembershipsuser = mysqli_query($db, $query);

// $gymMembershipsuserId = mysqli_fetch_assoc($gymMembershipsuserId);
// print_r($gymMembershipsuserId);

// $gymMembershipsuserId = mysqli_fetch_assoc($gymMembershipsuserId);
// print_r($gymMembershipsuserId);




// $query = "SELECT * FROM gymclass WHERE "



// $userData = mysqli_fetch_assoc($userData);



function pre_r($array)
    {
        // echo "array will be printed now";
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }

    // pre_r($gymMembershipsuserId->fetch_assoc());
    // pre_r($gymMembershipsuserId->fetch_assoc());