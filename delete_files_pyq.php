<?php
// Assuming you have already connected to your database
require 'admin_n_d.php';
$server_name="localhost:3307";
$username="root";
$password="";
$database_name="fileuploaddownload";
$conn=mysqli_connect($server_name,$username,$password,$database_name);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['filesToDelete'])) {
    $filesToDelete = $_POST['filesToDelete'];

    foreach ($filesToDelete as $fileId) {
        // Delete the file from the database table
        $sql = "DELETE FROM files_pyq WHERE id = $fileId";
        mysqli_query($conn, $sql);
        
        // You may want to delete the file from the server as well
        // Example: unlink($filePath);
    }

    echo "Selected files have been deleted.";
} else {
    echo "No files selected for deletion.";
}
?>