<?php

require 'common.php';

$test_name = $_POST['test_name'];
$p_id = $_GET['p_id'];

$bill = $_FILES['bill']['name'];
    
$tmp = $_FILES['bill']['tmp_name'];
move_uploaded_file($tmp, "uploads/".$bill);

$report_destination = "utilities/uploads/".$bill;

$insert_query = "INSERT into p_records (p_id,test_name,test_file) VALUES ('$p_id','$test_name','$report_destination')";
$query_result = mysqli_query($connect, $insert_query) or die(mysqli_error($connect));

header("location: ./../table.php");


?>