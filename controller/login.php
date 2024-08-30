<?php
include_once("../admin/controller/db.php");
session_start();
if (isset($_REQUEST['signin'])) {
	$email=$_REQUEST['email'];
	$password=$_REQUEST['password'];
	$emailquery="SELECT * FROM register WHERE email='$email'";
	$emailrun=mysqli_query($con,$emailquery);
	$emailcount=mysqli_num_rows($emailrun);
	if ($emailcount) {
		$pass=mysqli_fetch_array($emailrun);
		$dbpass=$pass['password'];
		// $passverify=password_verify($password, $dbpass);
		$_SESSION['name']=$pass['username'];
		$_SESSION['email']=$pass['email'];
		if ($password==$dbpass) {
            ?>
            <script>
            window.location.href = "../index2.php";
            </script>
            <?php
		}
		else{
            ?>
            <script>
            window.location.href = "../login.html";
            </script>
            <?php
		}
	}
	
}
?>
