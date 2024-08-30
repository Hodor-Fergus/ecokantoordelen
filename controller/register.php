<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('../admin/controller/db.php');
if(isset($_REQUEST['register'])){
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {

 $username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$org=$_POST['organaization'];
 $regins="insert into register(username,email,password,type)values('$username','$email','$password','$org')";
 $regqur =mysqli_query($con,$regins);
 if($regqur==true){
 	header("location:../login.php");
 }
 else{
 	header("location:../register.html");
 }
}
?>