<?php
include_once('../admin/controller/db.php');
if(isset($_REQUEST['registration'])){
$cname=$_REQUEST['companyname'];
$cid=$_REQUEST['companyid'];
$street=$_REQUEST['companystreet'];
$city=$_REQUEST['companycity'];
$pcode=$_POST['companypostal'];
$country=$_POST['country'];
$temployee=$_POST['temployee'];
$aemployee=$_POST['aemployee'];
$technical=$_POST['technical'];
$nontechnical=$_POST['nontechnical'];
$aspace="Pending";
$reg="INSERT INTO cregister(cname,cid,street,city,pcode,country,temployee,aemployee,technical,nontechnical,aspace)VALUES('$cname','$cid','$street','$city','$pcode','$country','$temployee','$aemployee','$technical','$nontechnical','$aspace')";
 $regqur =mysqli_query($con,$reg);
 if($regqur){
 	header("location:../index2.php");
 }
 else{
 	header("location:../registration.php?failed");
 }
}
?>