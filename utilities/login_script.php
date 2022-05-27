<?php
require 'common.php';

# Using the post method to gather the value from the login form
$email = $_POST['email'];
$email = mysqli_real_escape_string($connect, $email);

$role = $_POST['role'];

$pwd = $_POST['password'];

$user_pwd = $pwd;
$pwd = mysqli_real_escape_string($connect, $pwd);
$pwd = md5($pwd);

# Check1: Whether the email exists or not?
$query1 = "SELECT h_email from hospitals WHERE h_email = '$email'";
$result_query1 = mysqli_query($connect, $query1) or die(mysqli_error($connect));

# Check2: Whether the provided password is correct or not
$query2 = "SELECT * from hospitals WHERE h_email = '$email' && password = '$pwd'";
$result_query2 = mysqli_query($connect, $query2) or die(mysqli_error($connect));
$row = mysqli_fetch_array($result_query2);   

$query3 = "SELECT * from sole_patient WHERE email = '$email' && pwd = '$pwd'";
$result_query3 = mysqli_query($connect, $query3) or die(mysqli_error($connect)); 
$row1 = mysqli_fetch_array($result_query3);  

$query4 = "SELECT email from sole_patient WHERE email = '$email'";
$result_query4 = mysqli_query($connect, $query4) or die(mysqli_error($connect));

$query5 = "SELECT email from doctors WHERE email = '$email'";
$result_query5 = mysqli_query($connect, $query5) or die(mysqli_error($connect));

$query6 = "SELECT * from doctors WHERE email = '$email' && pwd = '$pwd'";
$result_query6 = mysqli_query($connect, $query6) or die(mysqli_error($connect)); 
$row2 = mysqli_fetch_array($result_query6);  

# If the email doesn't exists:
if ($role=="Hospital") {
    if(mysqli_num_rows($result_query1) == 0) {
     echo ("<script>alert('Provided email is not registered yet!!'); location.href='./../login.php'</script>");   
    }
    
    # If the entered password is wrong:
    else if (mysqli_num_rows($result_query2) == 0) {
        echo ("<script>alert('Incorrect password!!'); location.href='./../login.php'</script>");
    }
    
    else if($row['logged_in'] == "true") {
        echo ("<script>alert('Already logged in with another device. You can only access your account with single device at a time'); location.href='./../login.php'</script>");
        }
    else {
        $update_query = "UPDATE hospitals SET logged_in = 'true' WHERE h_email = '$email'";
        $query_result = mysqli_query($connect, $update_query) or die(mysqli_error($connect));

        # Initiate the session variables
        $_SESSION['role'] = $role;
        $_SESSION['id'] = $row['h_id'];
        $_SESSION['icu'] = $row['icu'];
        $_SESSION['oxygen'] = $row['oxygen'];
        $_SESSION['name'] = $row['h_name'];
        $_SESSION['email'] = $row['h_email'];
        $_SESSION['beds'] = $row['beds'];
        $_SESSION['doctors'] = $row['doctor'];
        $_SESSION['qf'] = $row['quality_factor'];
    
        header("location: ./../index.php");   
    }
}
else if($role == "Patient") {
    if(mysqli_num_rows($result_query4) == 0) {
     echo ("<script>alert('Provided patient\'s email is not registered yet!!'); location.href='./../login.php'</script>");   
    }
    else if (mysqli_num_rows($result_query3) == 0) {
        echo ("<script>alert('Incorrect password!!'); location.href='./../login.php'</script>");
    }
    else {
        $_SESSION['age'] = $row1['age'];
        $_SESSION['phone'] = $row1['phone'];
        $_SESSION['id'] = $row1['id'];
        $_SESSION['role'] = $role;
        $_SESSION['name'] = $row1['p_name'];
        $_SESSION['email'] = $row1['email'];  
        
        header("location: ./../patient.php");   
    }
} 
else if($role == "Doctor") {
    if(mysqli_num_rows($result_query5) == 0) {
     echo ("<script>alert('Provided patient\'s email is not registered yet!!'); location.href='./../login.php'</script>");   
    }
    else if (mysqli_num_rows($result_query6) == 0) {
        echo ("<script>alert('Incorrect password!!'); location.href='./../login.php'</script>");
    }
    else {
        $_SESSION['h_id'] = $row2['h_id'];
        $_SESSION['phone'] = $row2['phone'];
        $_SESSION['id'] = $row2['d_id'];
        $_SESSION['role'] = $role;
        $_SESSION['name'] = $row2['name'];
        $_SESSION['email'] = $row2['email'];  
        
        header("location: ./../doctor.php");   
    }
}
?>