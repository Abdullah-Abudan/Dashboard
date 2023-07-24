<?php
$page_title = "add-brand"; 
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
            <h1>Add Brand</h1>
        </div>

        <div class="p-3">
            <a class="btn btn-primary" href="brand.php" role="button">All Brands</a>
        </div>
        
    </div>
    <br>
   

    <form action="" id="jform" method="POST">
      <input name="brname" id="jid" class="form-control form-control-sm" type="text" placeholder="Enter Brand Name" aria-label=".form-control-sm example" required>
      <br>

      <input name="submit" class="btn btn-primary" type="submit" value="Add brand" aria-label=".form-control-sm example">
    </form>
    <?php
    if(isset($_POST['submit']))
    {
        $bname=$_POST['brname'];
        $q="INSERT INTO brand set brand_name ='$bname'";
        $data=mysqli_query($conn,$q);
        if($data)
        {
            echo "<script>alert('Record Added')</script>";
            header("location:brand.php");
        }
        else
        {
            echo "<script>alert('Record Not Added')</script>";
            header("location:brand.php");
        }
        }
        ?>
        </body>
        </html>