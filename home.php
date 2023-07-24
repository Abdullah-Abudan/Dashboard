<?php
$page_title = "home"; 

  include("./config/constants.php");
  include("./config/check_elogin.php");

	$_SESSION['eid'];
	$eid=$_SESSION['eid'];

  $q="SELECT * FROM employee WHERE eid='$eid'";
	$res=mysqli_query($conn,$q);
  if($res && $res->num_rows>0){
    $data = $res->fetch_assoc();
    $ename = $data['ename'];
  }
?>

<style>
  .btn-group .btn-primary{
    display: none;
  }
</style>

<!DOCTYPE html>
<html lang="en">
<body>
    <div class="flex">
      <div>
        <h1>Home</h1>
      </div>
      <div class="btn-group">
      
        <a href="logout.php" class="btn btn-danger">Logout</a>
      
      </div>
    </div>
    
    <br>
    <h3>
      Hello <?php echo $ename ?>  
    </h3>

    
    <br>
    <div class="container text-center">
      <div class="row">
        <div class="col"><a href="productlist.php">
          All products
        </a></div>
       <div class="col second-box"> <a href="add-product.php">
          Add product
        </a></div>
        <div class="col"> <a href="shop.php">
          Shop
        </div>
      </div>
    </div>
  
    <br>
 
</body>
</html>