<!--space delete  -->
<?php
require("db.php");
$iditem=$_GET['delitem'];
$delete="DELETE FROM officespace WHERE id=$iditem";
$query=mysqli_query($con,$delete);
if ($query) {
	header("location:../registration.php?Deleted");
}
else{
	header("location:../registration.php?Not Deleted");
}
?>

<!-- company delete -->

<?php
require("db.php");
$cd=$_GET['comdel'];
$comdelete="DELETE FROM cregister WHERE id=$cd";
$query=mysqli_query($con,$comdelete);
if ($query) {
	header("location:../index.php?Deleted");
}
else{
	header("location:../index.php?Not Deleted");
}
?>