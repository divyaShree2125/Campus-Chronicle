<?php
// Check if the form for adding a club is submitted
/*if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"])) {
    if ($_POST["action"] == "add") {
        // Add a new club
        addClub($_POST["name"], $_POST["description"], $_POST["image"]);
    } elseif ($_POST["action"] == "remove") {
        // Remove a club
        removeClub($_POST["index"]);
    }
}

// Dummy clubs data for demonstration purposes
$clubs = [
    ["name" => "Chess Club", "description" => "Join us for chess matches every Wednesday.", "image" => "chess.jpg"],
    ["name" => "Coding Club", "description" => "Learn programming languages and build cool projects.", "image" => "coding.jpg"],
    ["name" => "Art Club", "description" => "Express your creativity through various art forms.", "image" => "art.jpg"],
    ["name" => "Sports Club", "description" => "Stay active and participate in various sports activities.", "image" => "sports.jpg"]
];

// Add a new club
function addClub($name, $description, $image) {
    global $clubs;
    $clubs[] = ["name" => $name, "description" => $description, "image" => $image];
}

// Remove a club
function removeClub($index) {
    global $clubs;
    unset($clubs[$index]);
}
?>*/
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

// Check if the form for adding a club is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"])) {
    if ($_POST["action"] == "add") {
        // Add a new club
        addClub($_POST["name"], $_POST["description"], $_POST["image"]);
    } elseif ($_POST["action"] == "remove") {
        // Remove selected clubs
        if (isset($_POST['clubs'])) {
            foreach ($_POST['clubs'] as $clubId) {
                removeClub($clubId);
            }
        }
    }
}

// Function to add a new club to the database
function addClub($name, $description, $image) {
    global $conn;

    // Sanitize input data to prevent SQL injection
    $name = $conn->real_escape_string($name);
    $description = $conn->real_escape_string($description);
    $image = $conn->real_escape_string($image);

    // Insert the club information into the database
    $sql = "INSERT INTO pyq (name, description, image) VALUES ('$name', '$description', '$image')";
    if ($conn->query($sql) === TRUE) {
        echo "New club added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Remove a club from the database
function removeClub($clubId) {
    global $conn;

    // Sanitize input data to prevent SQL injection
    $clubId = $conn->real_escape_string($clubId);

    // Delete the club from the database
    $sql = "DELETE FROM pyq WHERE id = '$clubId'";
    if ($conn->query($sql) === TRUE) {
        echo "Club deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Retrieve clubs from the database
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
?>
