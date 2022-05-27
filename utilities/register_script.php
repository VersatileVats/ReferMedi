<?php
require 'common.php';

$role = $_POST['role'];

// Regular expression / pattern which an email should follow:
$email_pattern = '/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/';

// Regular expression for password field: Min 8 characters, at least 1 letter, 1 number & 1 special character:
$pwd_pattern = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/";

if($role == "Patient") {

// Using the post mtheod to gather the patient's attributes
$age = $_POST['age'];
$user_name = $_POST['p_name'];
$phone = $_POST['phone'];
$user_pwd = $_POST['password'];
$user_email = $_POST['h_email'];
$user_conf_pwd = $_POST['password_repeat'];
$user_pwd = mysqli_real_escape_string($connect, $user_pwd);
$user_conf_pwd = mysqli_real_escape_string($connect, $user_conf_pwd);

$search_query1 = "SELECT email from sole_patient WHERE email = '$user_email'";
$result_search_query1 = mysqli_query($connect, $search_query1) or die(mysqli_error($connect));
$row1 = mysqli_num_rows($result_search_query1);   
   
}
 else if ($role == "Hospital") {
 
// Using the post mtheod to gather the hospital's attributes
$name = $_POST['h_name'];
$name = mysqli_real_escape_string($connect, $name);

$email = $_POST['h_email'];
$pwd = $_POST['password'];
$pwd = $pwd;
$conf_pwd = $_POST['password_repeat'];
$conf_pwd = mysqli_real_escape_string($connect, $conf_pwd);

$beds = $_POST['beds'];
$beds = mysqli_real_escape_string($connect, $beds);

$doctors = $_POST['doctors'];
$doctors = mysqli_real_escape_string($connect, $doctors);

$icu = $_POST['icu'];
$icu = mysqli_real_escape_string($connect, $icu);

$oxygen = $_POST['oxygen'];
$oxygen = mysqli_real_escape_string($connect, $oxygen);

    
$search_query = "SELECT h_email from hospitals WHERE h_email = '$email'";
$result_search_query = mysqli_query($connect, $search_query) or die(mysqli_error($connect));
$row = mysqli_num_rows($result_search_query);    
}

// check whether more than 2 records are there in the database, then deny the user
if ($row !=0 or $row1 !=0) {
    echo ("<script>alert('Email address already exists! Log in with another email'); location.href='./../register.php'</script>");
}
// If the user entered pwd doesn't matches with the password pattern:
elseif (!preg_match($pwd_pattern, $pwd) and !preg_match($pwd_pattern,$user_pwd)) {
    echo ("<script>alert('Not a valid password. Password must contain a minimum of 8 characters, atleast 1 number, 1 letter & 1 special character'); location.href='./../register.php'</script>");
}
elseif (!preg_match($email_pattern, $email) and !preg_match($email_pattern, $user_email)) {
    echo ("<script>alert('Not a valid email address'); location.href='./../register.php'</script>");
}
// if the pwd & confirm pwd doesn't match
elseif ($conf_pwd != $pwd and $user_conf_pwd != $user_pwd) {
    echo ("<script>alert('New password and confirm password doesn\'t match'); location.href='./../register.php'</script>");
}
// if all the entered data is correct, then do the manipulations
else {
    
    if($role == "Patient") {
     $user_email = mysqli_real_escape_string($connect, $user_email);
     $user_pwd = mysqli_real_escape_string($connect,$user_pwd);
     $pwd = md5($user_pwd);
     
     $insert_query = "INSERT into sole_patient (p_name,email,pwd,age,phone) VALUES ('$user_name','$user_email','$pwd','$age','$phone')";
     $query_result = mysqli_query($connect, $insert_query) or die(mysqli_error($connect));
     $id = mysqli_insert_id($connect);
     
     $_SESSION['id'] = $id;
     $_SESSION['role'] = $role;
     $_SESSION['age'] = $age;
     $_SESSION['phone'] = $phone;
     $_SESSION['name'] = $user_name;
     $_SESSION['email'] = $user_email;   
     
     header("location: ./../patient.php");
        
    } else if($role == "Hospital") {
        
     $email = mysqli_real_escape_string($connect, $email);

    $pwd =  mysqli_real_escape_string($connect, $pwd);
    // Using the MD5 hashing algorithm function
    $pwd = md5($pwd);

    // query to store the data into the database
    $qf=$beds/$doctors;
    $qf = number_format((float)$qf, 2, '.', '');
    $insert_query = "INSERT into hospitals (h_name,h_email,password,beds,doctor,icu,oxygen,logged_in) VALUES ('$name','$email','$pwd','$beds','$doctors','$icu','$oxygen','true')";
    $query_result = mysqli_query($connect, $insert_query) or die(mysqli_error($connect));
    $id = mysqli_insert_id($connect);

    // Setting up the session variables
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $name;
    $_SESSION['role'] = $role;
    $_SESSION['icu'] = $icu;
    $_SESSION['email'] = $email;
    $_SESSION['beds'] = $beds;
    $_SESSION['oxygen'] = $oxygen;
    $_SESSION['doctors'] = $doctors;
    $_SESSION['qf'] = $qf;

    // Re-routing the user to the index page
    header("location: ./../index.php");   
    }
}
