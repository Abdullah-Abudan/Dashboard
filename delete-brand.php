<?php
$page_title = "delete-brand"; 
include("./config/constants.php");
include("./config/check_alogin.php");
$did=$_GET['bid'];
$q="DELETE FROM brand WHERE id='$did'";
$res=mysqli_query($conn,$q);
if($res)
{
	echo "<script>alert('Record Deleted')</script>";
	header("location:brand.php");
}
else
{
	echo "sorry,Delete process failed";
}
?>