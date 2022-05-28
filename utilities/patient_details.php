<?php
require 'common.php';

function curlCalls($address) {
        $ch = curl_init();

        //Set the URL that you want to GET by using the CURLOPT_URL option.
        curl_setopt($ch, CURLOPT_URL, $address);

        //Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        //Execute the request.
        $data = curl_exec($ch);
}

function replaceSpace($var) {
    return str_replace(" ","%20",$var);
}
    
// Using the post mtheod to gather the value from the login form
$email = $_GET['email'];
$email = mysqli_real_escape_string($connect, $email);

$name = $_GET['name'];
$name = mysqli_real_escape_string($connect, $name);

$doa = $_GET['doa'];
$doa = mysqli_real_escape_string($connect, $doa);

$age = $_GET['age'];
$age = mysqli_real_escape_string($connect, $age);

$d_cat = $_GET['select_disease'];
$d_cat = mysqli_real_escape_string($connect, $d_cat);

$note = $_GET['note'];
$note = mysqli_real_escape_string($connect, $note);

$phone = $_GET['phone'];

$status = $_GET['status'];

if($status != "true") {
    $status = "false";
}

$search_query = "SELECT email from patients WHERE email = '$email'";
$search_query_result = mysqli_query($connect, $search_query) or die(mysqli_error($connect));

// Email is not registered
if(mysqli_fetch_array($search_query_result) == 0) {
 // Insert the records
$insert_query = "INSERT into patients (h_id,name,age,doa,d_category,email,note,phone,critical) VALUES ('$_SESSION[id]','$name','$age','$doa','$d_cat','$email','$note','$phone','$status')";
$query_result = mysqli_query($connect, $insert_query) or die(mysqli_error($connect));

$p_id = mysqli_insert_id($connect);

$query2 = "SELECT h_name from hospitals WHERE h_id = '$_SESSION[id]'";
$result_query2 = mysqli_query($connect, $query2) or die(mysqli_error($connect));
$row = mysqli_fetch_array($result_query2);

$h_name = $row['h_name'];
$h_name = replaceSpace($h_name);
$name = replaceSpace($name);
$d_cat = replaceSpace($d_cat);

// curlCalls("https://hook.us1.make.com/7sbxcfcxlgfpcxmamh73n5jvg7hav3d9?phone=+91".$phone."&h_name=".$h_name."&name=".$name."&category=".$d_cat."&p_id=".$p_id); 

    header("location: ./../table.php");
}

else {
    echo ("<script>alert('Email already registered. Use another email id'); location.href='./../profile.php?action=create_user'</script>");
}