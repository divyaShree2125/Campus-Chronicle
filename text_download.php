<?php
//database connection details

$db_host = "localhost:3307";
$db_user = "root";
$db_pass = "";
$db_name = "fileuploaddownload";

 $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);


 if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

 //Fetch the uploaded files from the database

 $sql = "SELECT *FROM files";
 $result = $conn->query($sql);
 $sql1 = "SELECT *FROM text";
 $result1 = $conn->query($sql1);
 $sql2 = "SELECT *FROM text1";
 $result2 = $conn->query($sql2);

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Uploaded files</title>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<style>
    .row-content {
        font-weight: bold; /* Make the text bold */
    }

    .column {
        margin-right: 10px; /* Add some space between columns */
    }
</style>

<div class="container mt-5">
    <?php
    if ($result1->num_rows > 0) {
        #while ($row = $result1->fetch_assoc()) {
         #   echo "<div class='row-content'>"; // Start a new line for each row
          #  echo "<div class='column'>" . $row['id'] . "</div>"; // Separate column for id
           
           # echo "<div class='column'>" . ($row['textarea_content'] ). "</div>"; // Separate column for textarea_content
           # echo "</div>"; // End of the line
        #}
        echo "links:";
        while ($row = mysqli_fetch_assoc($result1)) {
            echo "<div class='column'>" . $row['id'] .".";
            echo '<a href="' . $row['textarea_content'] . '">' . $row['textarea_content'] . '</a><br>';
        }
    }
   
     if ($result2->num_rows > 0) {
        echo "Text:";
        while ($row = $result2->fetch_assoc()) {
          echo "<div class='row-content'>"; // Start a new line for each row
           echo "<div class='column'>" . $row['id'] . ".". ($row['textarea_content'] ). "</div>"; // Separate column for id
           #echo "<div class='column'>". ".". ($row['textarea_content'] ). "</div>"; // Separate column for textarea_content
           echo "</div>"; // End of the line
        }
       
    }
    ?>
</div>
	<div class="container mt-5">
        <h2>Uploaded Files</h2>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>File Name</th>
                    <th>File Size</th>
                    <th>File Type</th>
                    <th>Download</th>
                </tr>
            </thead>
            <tbody>
                <?php
               
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $file_path = "uploads/" . $row['filename'];
                        ?>
                        <tr>
                            <td><?php echo $row['filename']; ?></td>
                            <td><?php echo $row['filesize']; ?> bytes</td>
                            <td><?php echo $row['filetype']; ?></td>
                            <td><a href="<?php echo $file_path; ?>" class="btn btn-primary" download>Download</a></td>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="4">No files uploaded yet.</td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
