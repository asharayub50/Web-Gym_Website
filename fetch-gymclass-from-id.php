<?php


$gymClassId = $row['gymclassid'];

$query = "SELECT * FROM gymclass WHERE id='$gymClassId'";

$gymClassData = mysqli_query($db, $query);

$gymClassData = mysqli_fetch_assoc($gymClassData);




