<?php

require 'common.php';

$p_id = $_GET['p_id'];

$delete_query = "DELETE FROM patients WHERE p_id = '$p_id'";
$query_result = mysqli_query($connect, $delete_query) or die(mysqli_error($connect));

header("location: ./../table.php");
?>