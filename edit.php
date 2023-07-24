<?php
$page_title = "edit-employee"; 
include("./config/constants.php");
include("./config/check_alogin.php");
?>

<style>
.employee{
    display: none;
    }
</style>

<?php
if(isset($_GET['eid'])){
    $eid=$_GET['eid'];
    $q="select * from employee where eid = '$eid'";
    $data = mysqli_query($conn,$q);
    if($data && $data->num_rows==1)
    {
        $employee = $data->fetch_assoc();
        $eid = $employee['eid'];
        $epassword = $employee['epassword'];
        $ename = $employee['ename'];
        $eemail = $employee['eemail'];
        $ecity = $employee['ecity'];
    }
    else
    {
        header("location:Employeelist.php");
    }
}
else
{
    header("location:Employeelist.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<body>
    <div class="d-flex mb-3">
        <div class="p-2">
            <h1>Update Employee</h1>
        </div>
        <div class="p-3">
            <a class="btn btn-primary" href="Employeelist.php" role="button">All Employee</a>
        </div> 
    </div>
    <br>
   
    <form action="" id="jform" method="POST">
        
      <input value="<?php echo $eid?>" name="emid" id="jid" class="form-control form-control-sm" type="text" placeholder="Enter Id" aria-label=".form-control-sm example" readonly>
      <br>
      <input value="<?php echo $ename?>" name="emname" id="jname" class="form-control form-control-sm" type="text" placeholder="Enter name" aria-label=".form-control-sm example" required>
      <br>
      <input value="<?php echo $eemail?>" name="ememail" id="jemail" class="form-control form-control-sm" type="email" placeholder="Enter email" aria-label=".form-control-sm example" required>
      <br>
      <input value="<?php echo $epassword?>" name="empass" id="jpass" class="form-control form-control-sm" type="password" placeholder="Enter password" aria-label=".form-control-sm example" required>
      <br>
      <select name="emcity" id="jcity" class="form-select form-select-sm" aria-label=".form-select-sm example">
        <option value="-">City</option>
        <?php
        $city = ["Gaza","Jenin","Jerusalem"];
        foreach($city as $c){
            $selected = $c === $ecity?"selected":"";
            echo"<option value='$c' $selected>$c</option>";
        }
        ?>
      </select>        
      <br>
      <input name="submit" class="btn btn-primary" type="submit" value="Submit" aria-label=".form-control-sm example">
    </form>
    <?php
    if(isset($_POST['submit'])){
        $emid=$_POST['emid'];
        $emname=$_POST['emname'];
        $ememail=$_POST['ememail'];
        $empass=$_POST['empass'];
        $emcity=$_POST['emcity'];

        $q="UPDATE employee SET ename='$emname', eemail ='$ememail', epassword ='$empass', ecity ='$emcity' WHERE eid ='$emid' ";
        $res=mysqli_query($conn,$q);
        if ($res) {
            $_SESSION['employee'] = '<h1>Record Updated!</h1>';
            header("location:Employeelist.php");
        } else {
            $_SESSION['employee'] = '<h1>Record Not Updated!</h1>';
            header("location:Employeelist.php");
        }
    }
    ?>
    </body>
    </html>