<?php
require 'utilities/common.php';

$update_query = "UPDATE hospitals SET logged_in = '' WHERE h_email = '$_SESSION[email]'";
$query_result = mysqli_query($connect, $update_query) or die(mysqli_error($connect));

session_start();
session_unset();
session_destroy();
header('location:play.php');
