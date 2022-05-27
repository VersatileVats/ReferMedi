<?php

require 'utilities/common.php';

$email = $_GET['email'];

$otp = rand(10000,99999);

$update_query = "UPDATE hospitals SET otp = '$otp' WHERE h_email = '$email'";
$query_result = mysqli_query($connect, $update_query) or die(mysqli_error($connect));

 $htmlContent = ' 
    <html>

    <body>

    <div style="margin: auto; border:5px solid #E49B0F; border-radius: 10px; width:500px; text-align: center">
        Your OTP is: '.$otp.'
    </div>

</body>
    
    </html>';
    
    // Set content-type header for sending HTML email 
    $headers = "MIME-Version: 1.0" . "\r\n"; 
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
    // Additional headers 
    $headers .= 'From: vishalsproject@wheels4water.me' . "\r\n"; 
    mail($email, 'ReferMedi: OTP', $htmlContent, $headers);

header("location: ./pwd.php?email=$email");


?>