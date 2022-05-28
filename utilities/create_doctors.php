<?php

require 'common.php';

$h_id = $_GET['h_id'];

$d_name = $_POST['d_name'];
$d_email = $_POST['d_email'];
$d_phone = $_POST['d_phone'];
$specification = $_POST['main'];

$pic = $_FILES['picture']['name'];
$tmp_pic = $_FILES['picture']['tmp_name'];

move_uploaded_file($tmp_pic, 'uploads/avatars/'.$pic);

$dest = "utilities/uploads/avatars/".$pic;

$insert_query = "INSERT into doctors (h_id,name,email,phone,profile,speciality) VALUES ('$_SESSION[id]','$d_name','$d_email','$d_phone','$dest','$specification')";
$query_result = mysqli_query($connect, $insert_query) or die(mysqli_error($connect));
$id = mysqli_insert_id($connect);

$pwd = $d_name.$id.'@2022';
$user_pwd = md5($pwd);

$update_query = "UPDATE doctors SET pwd =  '$user_pwd' WHERE d_id = '$id'";
$query_result1 = mysqli_query($connect, $update_query) or die(mysqli_error($connect));

$subject = "Greetings User"; 
 
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

        <h5 style="font-size: 18px">NOTIFICATION | LOGIN CREDENTIALS</h5>
        
        <div style="margin: 5px 0px; width:350px; margin: auto">
            <p>Dear '.$name.', your login credentials are as follows</p>

            <table style="width:100%;border: 3px solid #FFD700; border-radius: 10px">
                <tr>
                    <th style="border: 3px solid #FFD700; width:80px;">Field</th>
                    <th style="border: 3px solid #FFD700;">Value</th>
                </tr>
                <tr>
                    <td style="border: 3px solid #FFD700; width:100px;">Name</td>
                    <td style="border: 3px solid #FFD700;">'.$d_name.'</td>
                </tr>
                <tr>
                    <td style="border: 3px solid #FFD700; width:100px;">Email</td>
                    <td style="border: 3px solid #FFD700;">'.$d_email.'</td>
                </tr>
                <tr>
                    <td style="border: 3px solid #FFD700; width:100px;">Password</td>
                    <td style="border: 3px solid #FFD700;">'.$pwd.'</td>
                </tr>
                <tr>
                    <td style="border: 3px solid #FFD700; width:100px;">Phone</td>
                    <td style="border: 3px solid #FFD700;">'.$d_phone.'</td>
                </tr>
                <tr>
                    <td style="border: 3px solid #FFD700;">Speciality</td>
                    <td style="border: 3px solid #FFD700;">'.$specification.'</td>
                </tr>
            </table>
        </div>

        <p>In case you forget the password in future, you can <br>
        visit this email to see your login credentials</p>

        <button style="padding: 6px; margin: 10px; background: black; border-radius: 10px;">
            <a href="https://wheels4water.me/hackfest" target="blank" style="text-decoration: none; color: white ; font-weight: bold;">Account Login</a>
        </button>

    </div>
</body>

</html>'; 
 
    // Set content-type header for sending HTML email 
    $headers = "MIME-Version: 1.0" . "\r\n"; 
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
    // Additional headers 
    $headers .= 'From: vishalsproject@wheels4water.me' . "\r\n"; 
    mail($d_email, $subject, $htmlContent, $headers);

header("location: ./../doc.php?h_id=$h_id");


?>