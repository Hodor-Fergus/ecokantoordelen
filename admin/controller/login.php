<?php
include_once("db.php");
session_start();
if (isset($_REQUEST['signin'])) {
	$email=$_REQUEST['email'];
	$pass=$_REQUEST['password'];
	$search="select * from admin where email='$email'";        // check email from db
	$query=mysqli_query($con,$search);
	$emailcount=mysqli_num_rows($query);
	if ($emailcount) {
		$password=mysqli_fetch_array($query);
		$database_password=$password['password'];
		$_SESSION['name']=$password['name'];
		$_SESSION['email']=$password['email'];
		if ($database_password==$pass) {
			header("location:../index.php?true");             // redirect to the admin page
		}
		else{
			header("location:../login.html?false");
		}
	}
}
?>