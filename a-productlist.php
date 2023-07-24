<?php
$page_title = "a-productlist"; 
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
    <div class="d-flex mb-3" id="head-sec">

      <div class="p-2">
        <h2>All Products</h2>
      </div> 

      <div class="p-3"> </div>

      <div class="row ms-auto">
      <div class="col-md-12">
        <form class="d-flex" action="a-product-search.php" method="POST">
          <input type="search" id="myInput" class="form-control form-control-sm me-2 remove-focus" name="search" placeholder="Search..." aria-label=".form-control-sm example" required>
          <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>
      </div>
    </div>
    
      </div>
    <table class="table">
    <br>
    
    <thead>
      <tr>
        <th scope="col">Image</th>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Brand</th>
        <th scope="col">Price</th>
        <th scope="col">Discount</th>
        <th scope="col">Final Price</th>
        <th scope="col">Status</th>
        
        
      </tr>
    </thead>
    <tbody id="myTable">

    <?php
    $q="SELECT * FROM product";
    $res=mysqli_query($conn,$q);
    if($res && $res->num_rows>0){
      while ($data=$res->fetch_assoc()){
        echo "<tr>
        <td><img src='".$data['img_src']."' height='48px' width='48px'/></td>
        <td>".$data['pid']."</td>
        <td>".$data['pname']."</td>
        <td>".$data['brand']."</td>
        <td>".$data['price']." &dollar;</td>
        <td>".$data['discount']." %</td>
        <td>".$data['fprice']." &dollar;</td>
        <td>
        <a href='a-product-dt.php?pid=$data[pid]' style='text-decoration:none;'>
        <span> Details </span>
        </a>
        </td>
        </tr>";
      }
    }
    else
    {
      echo "No record found";
    }
    ?>
    </table>
    <br>  
</body>
</html>