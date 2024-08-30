<?php
include_once('db.php');
if(isset($_REQUEST['register'])){
 $username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
 $regins="insert into admin(name,email,password)values('$username','$email','$password')";
 $regqur =mysqli_query($con,$regins);
 if($regqur==true){
 	header("location:../registration.php");
 }
 else{
 	header("location:../registration.php?failed");
 }
}
?>