<?php
$page_title = "edit-product"; 

  include("./config/constants.php");
  include("./config/check_elogin.php");

	$_SESSION['eid'];
	$eid=$_SESSION['eid'];
?>

<style>
.admin{
    display: none;
    }
</style>

<?php
  // fetch brand options

  $q ="SELECT brand_name FROM brand";
  $res = $conn->query($q);
  if($res->num_rows> 0){
    while($brand=$res->fetch_assoc()){
      $brands[] = $brand['brand_name'];
    }
  }
?>

<?php 
if(isset($_GET['pid'])){
  $pid=$_GET['pid'];     
  $q="SELECT * FROM product WHERE pid='$pid'";
  $res=mysqli_query($conn,$q);
  if($res && $res->num_rows==1){
    $data = $res->fetch_assoc();
    $name = $data['pname'];
    $brand = $data['brand'];
    $img_src = $data['img_src'];
    $price = $data['price'];
    $discount = $data['discount'];
    $fprice = $data['fprice'];
  }   
}
else
{
  echo "No record found";
}
?>

<!DOCTYPE html>
<html lang="en">
  <body onload="discount()">
  <div class="d-flex mb-3">
    <div class="p-2">
      <h1>Edit Product</h1>
    </div>
    <div class="p-3">
      <a class="btn btn-primary" href="productlist.php" role="button">All Products</a>
    </div>   
  </div>
  <br>
  <form action="" id="jform" method="POST" enctype="multipart/form-data">
    <label for="emid" class="form-label">Employee Id</label> 
    <input name="emid" id="emid" class="form-control form-control-sm" type="text" value="<?php echo $eid ?> " aria-label=".form-control-sm example" readonly>
      <br>
      
      <label for="pid" class="form-label">Product Id</label>
      <input name="pid" value="<?php echo $pid ?>" id="pid" class="form-control form-control-sm" type="text" placeholder="Enter product Id" aria-label=".form-control-sm example" readonly>
      <br>
      
      <label for="pname" class="form-label">Product Name</label>
      <input name="pname" value="<?php echo $name; ?>" id="pname" class="form-control form-control-sm" type="text" placeholder="Enter product name" aria-label=".form-control-sm example" required>
      <br>
      
      <label for="pbrand" class="form-label">Product Brand</label>
      <select name="brand_name" id="pbrand" class="form-select form-select-sm" aria-label=".form-select-sm example" required>        
        <?php 
        foreach ($brands as $pbrand) {
          $selected = $pbrand === $brand?"selected":"";
          echo"<option value='$pbrand' $selected>$pbrand</option>";
        }
        ?>
      </select>
      <br>
      
      <label for="image" class="form-label">Edit Image</label> 
      <div class="mb-3"> 
        <input value="<?php echo $img_src ?>" class="form-control form-control-sm" id="image" type="file" name="upload-file">
      </div>
      <br>
      
      <label for="pprice" class="form-label">Product Price</label>
      <input name="pprice" value="<?php echo $price?>" id="pprice" class="form-control form-control-sm" type="number" aria-label=".form-control-sm example" onchange="discount()" required>
      <br>
      
      <label for="pdis" class="form-label">Discount %</label>
      <input name="pdis" value="<?php echo $discount ?>" id="pdis" class="form-control form-control-sm" type="number" aria-label=".form-control-sm example" onchange="discount()" required>
      <br>
      
      <label for="pfinal" class="form-label">Final Price</label>
      <input name="pfinal" value="<?php echo $fprice ?>" id="pfinal" class="form-control form-control-sm" type="number" aria-label=".form-control-sm example" onchange="discount()" readonly>
      <br>
      
      <input name="submit" class="btn btn-primary" type="submit" value="Update" aria-label=".form-control-sm example">
    </form>
    <?php
    if(isset($_POST['submit']))
    {
      $emid=$_POST['emid'];
      $pid=$_POST['pid'];
      $pname=$_POST['pname'];
      $brand_name=$_POST['brand_name'];

      $filename = $_FILES["upload-file"]["name"];
      $tempname = $_FILES["upload-file"]["tmp_name"];
      $folder = "Images/products/".$filename;
      if($filename)
      {
      move_uploaded_file($tempname,$folder); 
      }  
      else
      {
        $folder = $img_src;   
      }

      $pprice=$_POST['pprice'];
      $pdis=$_POST['pdis'];
      $pfinal=$_POST['pfinal'];

      $q="UPDATE product SET eid='$emid', pname='$pname', brand='$brand_name', img_src='$folder', price='$pprice', discount='$pdis', fprice='$pfinal' WHERE pid='$pid' ";
      $data=mysqli_query($conn,$q);
      if($data)
      {
        $_SESSION['product']='<h1 class="text-success">Product Updated</h1>';
        header("location:productlist.php");
      }
      else      
      {
        $_SESSION['product']='<h1 class="text-danger">Product not Updated</h1>';
        header("location:productlist.php");
      }         
    }
    ?>


<script>
function discount() {
  var price = document.getElementById("pprice").value;
  var ds = document.getElementById("pdis").value;
  var fds = ds / 100;
  var mds = price * fds;
  var final = price - mds;
  document.getElementById("pfinal").value = final;
}
</script>
</body>
</html>