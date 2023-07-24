<?php
$page_title = "add-Employee"; 

	include("./config/constants.php");
	include("./config/check_alogin.php");
?>

<style>
.employee{
    display: none;
    }
</style>

<!DOCTYPE html>
<html lang="en">
<body>
    <div class="d-flex mb-3">
        <div class="p-2">
            <h1>Add Employee</h1>
        </div>
        
        <div class="p-3">
            <a class="btn btn-primary" href="Employeelist.php" role="button">All Employee</a>
        </div>
        
    </div>
    <br>
   

    <form action="" id="jform" method="POST">
        
      <input name="emid" id="jid" class="form-control form-control-sm" type="text" placeholder="Enter Id" aria-label=".form-control-sm example" required>
      <br>
      <input name="emname" id="jname" class="form-control form-control-sm" type="text" placeholder="Enter name" aria-label=".form-control-sm example" required>
      <br>
      <input name="ememail" id="jemail" class="form-control form-control-sm" type="email" placeholder="Enter email" aria-label=".form-control-sm example" required>
      <br>
      <input name="empass" id="jpass" class="form-control form-control-sm" type="password" placeholder="Enter password" aria-label=".form-control-sm example" required>
      <br>
      <select name="ecity" id="jcity" class="form-select form-select-sm" aria-label=".form-select-sm example">
        <option value="-">City</option>
        <option value="Gaza">Gaza</option>
        <option value="Jenin">Jenin</option>
        <option value="Jerusalem">Jerusalem</option>
      </select>
      <br>
      <input name="submit" class="btn btn-primary" type="submit" value="Submit" aria-label=".form-control-sm example">
    </form>
    <?php

        if(isset($_POST['submit']))
        {
            $eid=$_POST['emid'];
            $ename=$_POST['emname'];
            $eemail=$_POST['ememail'];
            $epass=$_POST['empass'];
            $ecity=$_POST['ecity'];

            $q="INSERT INTO employee set eid='$eid',ename='$ename',eemail='$eemail',epassword='$epass',ecity='$ecity'";
            $res=mysqli_query($conn,$q);
                if ($res) {
                    $_SESSION['employee'] = '<h1>Record Added!</h1>';
                    header("location:Employeelist.php");
                } else {
                    $_SESSION['employee'] = '<h1>Record Not Added!</h1>';
                    header("location:Employeelist.php");
                }
            }
    ?>
</body>
</html>