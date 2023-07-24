<?php
$page_title = "delete-product"; 
include("./config/constants.php");
include("./config/check_elogin.php");		
$did=$_GET['pid'];
$q="DELETE FROM product WHERE pid='$did'";
$res=mysqli_query($conn,$q);
if($res)
{
	echo "<script>alert('Record Deleted')</script>";
	header("location:productlist.php");
}
else
{
	echo "sorry,Delete process failed";
}
?>