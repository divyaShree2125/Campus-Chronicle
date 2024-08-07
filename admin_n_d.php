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



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        .text-font{
            font-size: 35px;
            font-weight: bolder;
        }
        .height{
            height: 100vh;
        }
        .error, .success, .error1, .success1, .error2, .success2 {
            font-size: large;
        }
        .error, .error1, .error2 {
            color: red;
        }
        .success, .success1, .success2 {
            color: green;
        }
        .hide {
            display: none;
        }
        /* Styling for side panel links */
        .side-panel-links a {
            color: #fff; /* white color for text */
        }
        .side-panel-links a:hover {
            color: #fff; /* white color for text on hover */
            text-decoration: none; /* remove underline on hover */
        }
        .side-panel-links hr {
            border-color: #fff; /* white color for horizontal lines */
        }
        .side-panel-links a.active {
            background-color: #000080; /* dark blue color for active link background */
        }
        .pt-2.pb-2 text-center
        {
            top:0.6rem;
            color: rgb(253, 253, 253);
            font-family: Inter, 'Source Sans Pro';
            font-size: 1.8rem;
            font-style: italic;
            font-weight: 500;
            height: 2.5rem;
            left: 2.6rem;
            line-height: 1.2125;
            position: relative;
            display: inline-block;
            white-space: nowrap;
            width: 5.7rem;
        }
        .pt-2{
            color: rgb(253, 253, 253);
            font-family: Inter, 'Source Sans Pro';
            font-size: 1.8rem;
            font-style: italic;
            font-weight: 500;
            height: 2.5rem;
            left: 2.6rem;
            line-height: 1.2125;
            position: relative;
            display: inline-block;
            top: 0rem;
            white-space: nowrap;
            width: 5.7rem;
          }
          .notes-content {
            left: 100%;
            top: 1rem;
            display: none;
            position: absolute;
            background-color: #c4dcfd;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(164, 211, 161, 0.401);
            z-index: 1;
          }
          
          /* Links inside the dropdown */
          .notes-content a {
            color: rgb(0, 0, 0);
            padding: 12px 16px;
            text-decoration: none;
            display: block;
          }
          
          /* Change color of dropdown links on hover */
          .notes-content a:hover {
            background-color: #3b5ec5
          }

          
          /* Show the dropdown menu on hover */
          .pt-2:hover .notes-content {
            display: block;
          }
          
          /* Change the background color of the dropdown button when the dropdown content is shown */
          .pt-2:hover{
            color: #af7400;
          }
          .pt-3{
            color: rgb(253, 253, 253);
            font-family: Inter, 'Source Sans Pro';
            font-size: 1.8rem;
            font-style: italic;
            font-weight: 500;
            height: 2.5rem;
            left: 2.6rem;
            line-height: 1.2125;
            position: relative;
            display: inline-block;
            top:0rem;
            white-space: nowrap;
            width: 5.7rem;
          }
          .notice-content {
            left: 100%;
            top: 1rem;
            display: none;
            position: absolute;
            background-color: #c4dcfd;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(164, 211, 161, 0.401);
            z-index: 1;
          }
          
          /* Links inside the dropdown */
          .notice-content a {
            color: rgb(0, 0, 0);
            padding: 12px 16px;
            text-decoration: none;
            display: block;
          }
          
          /* Change color of dropdown links on hover */
          .notice-content a:hover {
            background-color: #3b5ec5
          }

          
          /* Show the dropdown menu on hover */
          .pt-3:hover .notice-content {
            display: block;
          }
          
          /* Change the background color of the dropdown button when the dropdown content is shown */
          .pt-3:hover{
            color: #af7400;
          }
          .pt-4{
            color: rgb(0, 0, 253);
            font-family: Inter, 'Source Sans Pro';
            font-size: 1.8rem;
            font-style: italic;
            font-weight: 500;
            height: 2.5rem;
            left: 2.6rem;
            line-height: 1.2125;
            position: relative;
            display: inline-block;
            bottom: 0.6rem;
            white-space: nowrap;
            width: 5.7rem;
          }
          .PYQ-content {
            left: 100%;
            top: 1rem;
            display: none;
            position: absolute;
            background-color: #c4dcfd;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(164, 211, 161, 0.401);
            z-index: 1;
          }
          
          /* Links inside the dropdown */
          .PYQ-content a {
            color: rgb(0, 0, 0);
            padding: 12px 16px;
            text-decoration: none;
            display: block;
          }
          
          /* Change color of dropdown links on hover */
          .PYQ-content a:hover {
            background-color: #3b5ec5
          }

          
          /* Show the dropdown menu on hover */
          .pt-4:hover .PYQ-content {
            display: block;
          }
          
          /* Change the background color of the dropdown button when the dropdown content is shown */
          .pt-4:hover{
            color: #af7400;
          }
          .pt-5{
            color: rgb(253, 253, 253);
            font-family: Inter, 'Source Sans Pro';
            font-size: 1.8rem;
            font-style: italic;
            font-weight: 500;
            height: 2.5rem;
            left: 2.6rem;
            line-height: 1.2125;
            position: relative;
            display: inline-block;
            bottom: 1rem;
            white-space: nowrap;
            width: 5.7rem;
          }
          .clubs-content {
            left: 100%;
            top: 1rem;
            display: none;
            position: absolute;
            background-color: #c4dcfd;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(164, 211, 161, 0.401);
            z-index: 1;
          }
          
          /* Links inside the dropdown */
          .clubs-content a {
            color: rgb(0, 0, 0);
            padding: 12px 16px;
            text-decoration: none;
            display: block;
          }
          
          /* Change color of dropdown links on hover */
          .clubs-content a:hover {
            background-color: #3b5ec5
          }

          
          /* Show the dropdown menu on hover */
          .pt-5:hover .clubs-content {
            display: block;
          }
          
          /* Change the background color of the dropdown button when the dropdown content is shown */
          .pt-5:hover{
            color: #af7400;
          }
          .pt-6{
            color: rgb(253, 253, 253);
            font-family: Inter, 'Source Sans Pro';
            font-size: 1.8rem;
            font-style: italic;
            font-weight: 500;
            height: 2.5rem;
            left: 2.6rem;
            line-height: 1.2125;
            position: relative;
            display: inline-block;
            top: 0rem;
            white-space: nowrap;
            width: 5.7rem;
          }
          .placement-content {
            left: 100%;
            top: 1rem;
            display: none;
            position: absolute;
            background-color: #c4dcfd;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(164, 211, 161, 0.401);
            z-index: 1;
          }
          
          /* Links inside the dropdown */
          .placement-content a {
            color: rgb(0, 0, 0);
            padding: 12px 16px;
            text-decoration: none;
            display: block;
          }
          
          /* Change color of dropdown links on hover */
          .placement-content a:hover {
            background-color: #3b5ec5
          }

          
          /* Show the dropdown menu on hover */
          .pt-6:hover .placement-content {
            display: block;
          }
          
          /* Change the background color of the dropdown button when the dropdown content is shown */
          .pt-6:hover{
            color: #af7400;
          }
          .pt-7{
            color: rgb(253, 253, 253);
            font-family: Inter, 'Source Sans Pro';
            font-size: 1.8rem;
            font-style: italic;
            font-weight: 500;
            height: 2.5rem;
            left: 2.6rem;
            line-height: 1.2125;
            position: relative;
            display: inline-block;
            top: 0rem; 
            white-space: nowrap;
            width: 5.7rem;
          }
          .user-content {
            left: 100%;
            top: 1rem;
            display: none;
            position: absolute;
            background-color: #c4dcfd;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(164, 211, 161, 0.401);
            z-index: 1;
          }
          
          /* Links inside the dropdown */
          .user-content a {
            color: rgb(0, 0, 0);
            padding: 12px 16px;
            text-decoration: none;
            display: block;
          }
          
          /* Change color of dropdown links on hover */
          .user-content a:hover {
            background-color: #3b5ec5
          }

          
          /* Show the dropdown menu on hover */
          .pt-7:hover .user-content {
            display: block;
          }
          
          /* Change the background color of the dropdown button when the dropdown content is shown */
          .pt-7:hover{
            color: #af7400;
          }
    </style>
       
</head>
<body>
    <div class="container-fluid">
        <div class="row bg-blue height">
            <div class="col-sm-2 bg-dark height" style="height: 900px;">
                <div class="side-panel-links">
                    <p class="pt-5 pb-5 text-center">
                        <a href="admin-panel.php" class="text-decoration-none active"><span class="text-light text-font">Admin</span></a>
                    </p>
                    <hr class="bg-light ">
                   
                    <hr class="bg-light ">
                    <div class="pt-2"><span class="text-light">Notes</span>
                        <div class="notes-content">
                            <a href="text_download.php">View</a>
                            <a href="admin.html">Insert</a>
                            <a href="admin_n_d.php">Delete</a>
                        </div>
                    </div>
                    <hr class="bg-light ">
                    <div class="pt-3"><span class="text-light">Notice</span>
                        <div class="notice-content">
                           <a href="notice/index.html">View</a>
                            <a href="notice/admin_club.html">Insert</a>
                            <a href="notice/admin_delete_notice.php">Delete</a>
                        </div>
                    </div>
                    <hr class="bg-light ">
                    <div class="pt-4"><span class="text-light">PYQ</span>
                        <div class="PYQ-content">
                           <a href="pyqtext_download.php">View</a>
                            <a href="pyqadmin.html">Insert</a>
                            <a href="admin_pyq_delete.php">Delete</a>
                        </div>
                    </div>
                    <hr class="bg-light ">
                    <div class="pt-5"><span class="text-light">Clubs</span>
                        <div class="clubs-content">
                        <a href="new_clubs/cindex.html">View</a>
                            <a href="new_clubs/admin_club.html">Insert</a>
                            <a href="new_clubs/admin_delete_notice.php">Delete</a>
                            
                        </div>
                    </div>
                    <hr class="bg-light ">
                    <div class="pt-6"><span class="text-light">Placements</span>
                        <div class="placement-content">
                            <a href="placement/index.html">View</a>
                            <a href="placement/admin_club.html">Insert</a>
                            <a href="placement/admin_delete_notice.php">Delete</a>
                        </div>
                    </div>
                    <div>
                    <hr class="bg-light ">
                    <p class="pt-8">
                          <a href="home.html" class="text-decoration-none"><span class="text-light">Home</span></a>
                    </p>
                    </div>
                    <hr class="bg-light ">
                    <div class="pt-7"><p>User</p>
                        <div class="user-content">
                            <a href="delete_admin/view_user.php">View</a>
                            <a href="delete_admin/delete1.php">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-10 bg-light">
               <div class="row">
                   <div class="col-sm-2">
                       <p class="text-center pt-5">
                        <img class="favicon-sHN" src="favicon.png" id="I1:135;4481:3141"/>
                                </p>
                   </div>
                   <div class="col-sm-8">
                       <h1 class="text-center pt-4 pb-5"><strong>DELETE </strong></h1>
                       <hr class="w-25 mx-auto">
                   </div>
                   <div class="col-sm-2">
                       <p class="pt-5 text-center">
                            
                       </p>
                   </div>
               </div>
               <div class="container mx-auto">
               
                <form action="delete_files.php" method="POST"id="the-form" class="form-control w-50 mx-auto" enctype="multipart/form-data">
                <label for="file" class="form-label"><strong>Select file</strong></label><br>
                    <?php
                   
                    $sql = "SELECT id, filename FROM files  ";
                    $result = mysqli_query($conn, $sql);
            
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<input type="checkbox" name="filesToDelete[]" value="' . $row['id'] . '">';
                            echo $row['filename'] . '<br>';
                        }
                    } else {
                        echo "No files found";
                    }
                    ?>
                    <br>
                    <input type="submit" value="Delete Selected Files">
                </form>
                <form action="delete_text.php" method="POST"id="the-form" class="form-control w-50 mx-auto" enctype="multipart/form-data">
                <label for="file" class="form-label"><strong>Select text</strong></label><br>
                    <?php
                   
                    $sql2 = "SELECT id, textarea_content FROM text1  ";
                    $result2= mysqli_query($conn, $sql2);
            
                    if (mysqli_num_rows($result2) > 0) {
                        while ($row = mysqli_fetch_assoc($result2)) {
                            echo '<input type="checkbox" name="filesToDelete[]" value="' . $row['id'] . '">';
                            echo $row['textarea_content'] . '<br>';
                        }
                    } else {
                        echo "No files found";
                    }
                    ?>
                    <br>
                    <input type="submit" value="Delete Selected text">
                </form>
                <form action="detete_n_l.php" method="POST"id="the-form" class="form-control w-50 mx-auto" enctype="multipart/form-data">
                <label for="file" class="form-label"><strong>Select links</strong></label><br>
                    <?php
                   
                    $sql1 = "SELECT id, textarea_content FROM text  ";
                    $result1= mysqli_query($conn, $sql1);
            
                    if (mysqli_num_rows($result1) > 0) {
                        while ($row = mysqli_fetch_assoc($result1)) {
                            echo '<input type="checkbox" name="filesToDelete[]" value="' . $row['id'] . '">';
                            echo $row['textarea_content'] . '<br>';
                        }
                    } else {
                        echo "No files found";
                    }
                    ?>
                    <br>
                    <input type="submit" value="Delete Selected links">
                </form>
                                
                                
                                       
                             
                                       
                        </p>
                        
                    
                    
               </div>
                
            </div>
        </div>
    </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
                    