<?php
$page_title = "dashboard"; 
include("./config/constants.php");
include("./config/check_alogin.php");

$_SESSION['aid'];
$aid=$_SESSION['aid'];
?>

<!DOCTYPE html>
<html lang="en">

  <style>
  .flex-right{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    }
  .flex-right h4{
    padding-right: 12px;
    font-weight: bold;
  }
  .btn-group .btn-primary{
    display: none;
  }
  </style>
  <body>
    <div class="flex">
      <div>
        <h1>Dashboard</h1>
      </div>
      <div class="flex-right">
        <h4> <?php echo $aid ?></h4>
        <a href="logout.php" class="btn btn-danger">Logout</a>
      </div>
    </div>
    <br>
    <div class="container text-center">
      <div class="row">
        <div class="col"><a href="Employeelist.php">
          All employee
        </a></div>
       <div class="col second-box"> <a href="insert.php">
          Add employee
        </a></div>
        <div class="col"><a href="a-productlist.php">
          All Products
        </a></div>
      </div>
    </div>

    <br>
    <div class="container text-center">
      <div class="row">
        <div class="col"><a href="brand.php">
          Brnds
        </a></div>
       <div class="col second-box"> <a href="add-brand.php">
          Add Brands
        </a></div>
        <div class="col"><a href="#">
          Profile
        </a></div>
      </div>
    </div>
</body>
</html>