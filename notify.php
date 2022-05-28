<?php

require 'utilities/common.php';

$res = $_GET['result'];
$id = $_GET['id'];

if($res == "accept") {
 $doc = $_GET['doc'];
 $name = $_GET['p_name'];
 $email = $_GET['email'];
 
 $subject = "Appointment Accepted"; 
 
    $htmlContent = ' 
    <html>

<head>
    <title>Login</title>
</head>

<body>
  <div style="margin: auto; border:5px solid #E49B0F; border-radius: 10px; width:500px; text-align: center">
        
        <div style="background: #FFD700; padding: 5px 0px">
            <p>
                <span style="background: whitesmoke; font-size:45px; font-weight: 500; border-radius: 8px; padding: 0px 5px">ReferMedi</span> <br>
                <span style="background: whitesmoke; font-size:45px; font-weight: 500; border-radius: 8px; padding: 0px 5px">welcome you</span>
            </p>    
            <p>
                <span style="background: whitesmoke;font-size:15px; border-radius: 8px; padding: 0px 5px">
                    to the next generation platform for managing patients, referring them & making a collaborative space for <b>Patients Hospitals & Doctors</b>
                </span>
            </p>
        </div>
        
        <div style="margin: 5px 0px; width:350px; margin:auto">
            <p>Dear <b>'.$name.'</b>, your appointment with <b>Dr. '.$doc.'</b> has been accepted. Now you can just check your dashboard and connect with the doctor for yout treatment.</p>
        </div>

        <br>
        
        <p>Wishing for your speedy recovery</p>

    </div>
</body>

</html>'; 
 
    // Set content-type header for sending HTML email 
    $headers = "MIME-Version: 1.0" . "\r\n"; 
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
    // Additional headers 
    $headers .= 'From: vishalsproject@wheels4water.me' . "\r\n"; 
    mail($email, $subject, $htmlContent, $headers);
    
    // $delete_query = "DELETE FROM appointment WHERE id = '$id'";
    // $query_result = mysqli_query($connect, $delete_query) or die(mysqli_error($connect));
    
    $update_query1 = "UPDATE appointment SET status = 'accepted' WHERE id = '$id'";
    $query_result1 = mysqli_query($connect, $update_query1) or die(mysqli_error($connect));
    
    header("location: index.php");
    
} elseif ($res == "reject") {
    $delete_query = "DELETE FROM appointment WHERE id = '$id'";
    $query_result = mysqli_query($connect, $delete_query) or die(mysqli_error($connect));
    
    header("location: index.php");
}

?>