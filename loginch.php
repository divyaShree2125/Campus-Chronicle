<?php

$server_name = "localhost:3307";
$username = "root";
$password = "";
$database_name = "campus";

$conn = mysqli_connect($server_name, $username, $password, $database_name);

// Check the connection
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if (isset($email) || isset($password)) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate user credentials
    $sql_query = "SELECT * FROM `registration` WHERE `email`='$email' AND `password`='$password'";
    $result = mysqli_query($conn, $sql_query);

        if (mysqli_num_rows($result) > 0) {
            echo "Login successful!";
            header("Location: home.html");
            exit();
        } else {
            echo "Invalid email or password.";
        }

    mysqli_close($conn);
}
?>