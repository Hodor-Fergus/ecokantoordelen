<?php
include_once('db.php');
if(isset($_REQUEST['officespace'])){
 $officename=$_POST['officename'];
$tspace=$_POST['tspace'];
$address=$_POST['address'];
 $regins="insert into officespace(officename,tspace,address)values('$officename','$tspace','$address')";
 $regqur =mysqli_query($con,$regins);
 if($regqur==true){
 	header("location:../registration.php");
 }
 else{
 	header("location:../registration.php?failed");
 }
}
?>