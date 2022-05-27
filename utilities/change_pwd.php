<?php
require 'common.php';

$email = $_GET['email'];
$pwd = $_POST['password'];

$user_pwd = $pwd;
$conf_pwd = $_POST['confirm_password'];
$conf_pwd = mysqli_real_escape_string($connect, $conf_pwd);

$otp = $_POST['otp'];

// Regular expression for password field: Min 8 characters, at least 1 letter, 1 number & 1 special character:
$pwd_pattern = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/";

$search_query = "SELECT otp from hospitals WHERE h_email = '$email'";
$result_search_query = mysqli_query($connect, $search_query) or die(mysqli_error($connect));
$row = mysqli_fetch_array($result_search_query);

if($row['otp'] != $otp) {
 echo ("<script>alert('Wrong OTP entered, try again'); location.href='./../pwd.php?email=$email'</script>");
}
elseif (!preg_match($pwd_pattern, $pwd)) {
    echo ("<script>alert('Not a valid password. Password must contain a minimum of 8 characters, atleast 1 number, 1 letter & 1 special character'); location.href='./../pwd.php?email=$email'</script>");
}
// if the pwd & confirm pwd doesn't match
elseif ($conf_pwd != $pwd) {
    echo ("<script>alert('New password and confirm password doesn\'t match'); location.href='./../pwd.php?email=$email'</script>");
}
// if all the entered data is correct, then do the manipulations
else {
    $pwd = md5($pwd);

    $update_query = "UPDATE hospitals SET password = '$pwd' WHERE h_email = '$email'";
    $query_result = mysqli_query($connect, $update_query) or die(mysqli_error($connect));

    // Re-routing the user to the index page
    header("location: ./../login.php"); 
}

?>
