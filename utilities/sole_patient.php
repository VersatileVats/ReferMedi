<?php
require 'common.php';
    
// Using the post mtheod to gather the value from the login form
$email = $_GET['email'];
$email = mysqli_real_escape_string($connect, $email);

$phone = $_GET['phone'];

$update_query = "UPDATE sole_patient SET email = '$email', phone = '$phone' WHERE id = '$_SESSION[id]'";
$query_result = mysqli_query($connect, $update_query) or die(mysqli_error($connect));

$_SESSION['email'] = $email;
$_SESSION['phone'] = $phone;

header("location: ./../patient.php");