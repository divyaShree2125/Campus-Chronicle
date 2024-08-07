<?php
$checkotp=$_POST['checkotp'];
$otp=$_POST['otp'];
session_start();
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$confirmPassword = $_SESSION['confirmPassword'];

// Process data if needed

// Pass data to intermediary2.php using sessions, cookies, or URL parameters

$_SESSION['username'] = $username;
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;
$_SESSION['confirmPassword'] = $confirmPassword;

if($checkotp==$otp)
{
    
    header("Location: registerc.php");
    echo "OTP verification and signup...";
    exit();
}
else{
   
    //header("Location:index4.html");
    echo "Incorrect OTP";
    exit();
}