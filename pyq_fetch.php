<?php
// Database connection configuration
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "fileuploaddownload";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch clubs from the database table
$sql = "SELECT name, description, image FROM pyq";
$result = $conn->query($sql);

$clubs = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $clubs[] = $row;
    }
}

// Close database connection
$conn->close();

// Send club data as JSON response
header('Content-Type: application/json');
echo json_encode($clubs);
?>
