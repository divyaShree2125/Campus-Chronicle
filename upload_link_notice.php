<?php 
require 'admin_notice_u.html';
$server_name="localhost:3307";
$username="root";
$password="";
$database_name="fileuploaddownload";
$conn=mysqli_connect($server_name,$username,$password,$database_name);
 
if(!$conn)
{
	die(mysqli_error());
}
 
if(isset($_POST['submit']))
{
	$textareaValue = trim($_POST['content']);
	
	$sql = "insert into text_notice (textarea_content) values ('".$textareaValue."')";
	$rs = mysqli_query($conn, $sql);
	$affectedRows = mysqli_affected_rows($conn);
	
	if($affectedRows == 1)
	{
		$successMsg = "Record has been saved successfully";
	}
}
?>
<?php 
		if(isset($successMsg))
		{
			echo "<div class='success-msg'>";
			print_r($successMsg);
			echo "</div>";
		}
	?>