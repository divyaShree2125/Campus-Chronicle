<?php
// Connect to your database (replace with your database credentials)
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "campus";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if email exists in the registration table
$email = $_POST['email'];
$sql = "SELECT COUNT(*) AS count FROM admin_email WHERE email = '$email'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$count = $row['count'];

// Send response back to client-side JavaScript
if ($count > 0) {
    echo "valid";
} else {
    echo "invalid";
}

// Close connection
$conn->close();
?>
