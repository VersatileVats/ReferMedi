<?php
require 'common.php';

$beds = $_GET['beds'];
$beds = mysqli_real_escape_string($connect, $beds);

$doctors = $_GET['doctors'];
$doctors = mysqli_real_escape_string($connect, $doctors);

$icu = $_GET['icu'];
$icu = mysqli_real_escape_string($connect, $icu);

$oxygen = $_GET['oxygen'];
$oxygen = mysqli_real_escape_string($connect, $oxygen);

$qf = $beds/$doctors;
$qf = number_format((float)$qf, 2, '.', '');

$update_query = "UPDATE hospitals SET beds= '$beds', doctor = '$doctors', icu = '$icu', oxygen = '$oxygen' WHERE h_id = '$_SESSION[id]';";
$query_result = mysqli_query($connect, $update_query) or die(mysqli_error($connect));

    // $_SESSION['email'] = $email;
    $_SESSION['beds'] = $beds;
    $_SESSION['doctors'] = $doctors;
    $_SESSION['icu'] = $icu;
    $_SESSION['oxygen'] =$oxygen;
    
    header("location: ./../index.php");
    
?>