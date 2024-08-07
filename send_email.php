<?php

// To Remove unwanted errors
error_reporting(0);

// Add your connection Code
include "connection.php";

// Important Files (Please check your file path according to your folder structure)
require "./PHPMailer-master/src/PHPMailer.php";
require "./PHPMailer-master/src/SMTP.php";
require "./PHPMailer-master/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// Email From Form Input
$send_to_email = $_POST["email"];

// Generate Random 6-Digit OTP
$verification_otp = random_int(100000, 999999);

// Full Name of User
$send_to_name = $_POST["username"];

function sendMail($send_to, $otp, $name) {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Enter your email ID
    $mail->Username = "anamika.kumari37901@gmail.com";
    $mail->Password = "vlft wpnp kcbl cznz";

    // Your email ID and Email Title
    $mail->setFrom("anamika.kumari37901@gmail.com", "Campus Chronicle");

    $mail->addAddress($send_to);

    // You can change the subject according to your requirement!
    $mail->Subject = "Account Activation";

    // You can change the Body Message according to your requirement!
    $mail->Body = "Hello, {$name}\nYour account registration is successfully done! Now activate your account with OTP {$otp}.";
    $mail->send();
}

sendMail($send_to_email, $verification_otp, $send_to_name);
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

// Process data if needed

// Pass data to intermediary2.php using sessions, cookies, or URL parameters
session_start();
$_SESSION['username'] = $username;
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;
$_SESSION['confirmPassword'] = $confirmPassword;

// Message to print email success!
//echo "Email Sent Successfully!";

?>

<!-- <form action="submitotp.php" method="POST">
    Enter OTP
    <input type="number" name="checkotp" placeholder="Enter OTP">
    <input type="hidden" name="otp" value="<?php echo $verification_otp; ?>">
    <button type="submit">verify</button>
</form> -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verify OTP Form</title>
  <style>
    body {
      background-image: url('BV-9.jpg'); /* Replace 'background-image.jpg' with your image URL */
      background-size: cover;
      background-position: center;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh; /* Full height of viewport */
      margin: 0; /* Remove default margin */
    }

    form {
      width: 300px;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      text-align: center;
      background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
      transition: all 0.3s ease; /* Smooth transition */
    }

    form:hover {
      transform: scale(1.05); /* Scale up on hover */
    }

    input[type="number"] {
      width: 100%;
      margin-bottom: 10px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
      transition: border-color 0.3s ease; /* Smooth transition for border color */
    }

    input[type="number"]:focus {
      border-color: #007bff; /* Change border color on focus */
    }

    button[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease; /* Smooth transition for background color */
    }

    button[type="submit"]:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <form action="submitotp.php" method="POST">
    <label for="checkotp">Enter OTP</label>
    <input type="number" id="checkotp" name="checkotp" placeholder="Enter OTP" required>
    <input type="hidden" name="otp" value="<?php echo $verification_otp; ?>">
    <button type="submit">Verify</button>
  </form>
</body>
</html>
