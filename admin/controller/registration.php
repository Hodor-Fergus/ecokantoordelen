<?php
include_once('db.php');
if(isset($_REQUEST['registration'])){
 $cname=$_POST['companyname'];
$cid=$_POST['companyid'];
$street=$_POST['companystreet'];
$city=$_POST['companycity'];
$pcode=$_POST['companypostal'];
$country=$_POST['country'];
$temployee=$_POST['temployee'];
$aemployee=$_POST['aemployee'];
$technical=$_POST['technical'];
$nontechnical=$_POST['nontechnical'];
$registration="INSERT INTO companyregister(cname,cid,street,city,pcode,country,temployee,aemployee,technical,nontechnical)VALUES('$cname',$cid','$street','$city','$pcode','$country',$temployee','$aemployee','$technical','$nontechnical')";
 $regqur =mysqli_query($con,$registration);
 if($regqur==true){
 	header("location:../index2.php");
 }
 else{
 	header("location:../registration.php?failed");
 }
}
?>