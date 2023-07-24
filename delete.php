<?php	
$page_title = "delete-employee"; 
include("./config/constants.php");
include("./config/check_alogin.php");
if(isset($_GET['eid'])){
	$did=$_GET['eid'];
	$q="DELETE FROM employee WHERE eid='$did'";
	$res=mysqli_query($conn,$q);
	if($res)
	{
		echo "<script>alert('Record Deleted')</script>";
		header("location:Employeelist.php");
	}
	else
	{
		echo "<script>alert('sorry,Delete process failed')</script>";
		header("location:Employeelist.php");
	}
}
?>