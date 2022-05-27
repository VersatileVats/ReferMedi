<?php

include 'common.php';

$p_id = $_GET['p_id'];
$h_id = $_GET['h_id'];
$d_id = $_GET['d_id'];
$speciality = $_GET['speciality'];

$insert_query = "INSERT into appointment (p_id,h_id,d_id,speciality,timing) VALUES ('$p_id','$h_id','$d_id','$speciality',convert_tz(CURRENT_TIMESTAMP,'+00:00','+05:30'))";
$query_result = mysqli_query($connect, $insert_query) or die(mysqli_error($connect));

header("location: ./../p_doc.php");

