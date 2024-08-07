<?php
//require 'index4.html';

$server_name="localhost:3307";
$username="root";
$password="";
$database_name="campus";

$conn=mysqli_connect($server_name,$username,$password,$database_name);

if(!$conn)
{
	die("Connection Failed:" . mysqli_connect_error());

}

if(isset($username) ||  isset($email) || isset($password) || isset($cpassword))
{	
	session_start();
	$username = $_SESSION['username'];
	$email = $_SESSION['email'];
	$password = $_SESSION['password'];
	$cpassword = $_SESSION['confirmPassword'];

	 

	 $sql_query = "INSERT INTO `admin_registration`(`name`,`email`,`password`,`cpassword`)
	 VALUES ('$username','$email','$password','$cpassword')";

	 if (mysqli_query($conn, $sql_query)) 
	 {
		echo "data entered..";
        header("Location:index5.html");
        exit();
	 } 
	 else
     {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>