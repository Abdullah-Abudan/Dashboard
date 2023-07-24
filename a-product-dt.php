<?php
$page_title = "a-product-details"; 
include("./config/constants.php");
include("./config/check_alogin.php");
if(isset($_GET['pid'])){
  $product_id = $_GET['pid'];
  $q = "SELECT * FROM product WHERE pid = '$product_id'";
  $res = mysqli_query($conn,$q);
  if($res && $res->num_rows==1)
  {
    $data = $res->fetch_assoc();
    $product_name = $data['pname'];
    $product_brand = $data['brand'];
    $product_image = $data['img_src'];
    $product_price = $data['price'];
    $product_discount= $data['discount'];
    $product_fprice = $data['fprice'];
  } 
  else
  {
    header("location:dashboard.php");
  }
}
else
{
  header("location:dashboard.php");
}
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
            <h1>Product Details</h1>
        </div>
        
        <div class="p-3">
            <a class="btn btn-primary" href="a-productlist.php" role="button">All Products</a>
        </div>
    </div>
    <br>
    <div class="img-container">
      <img src="<?php echo $product_image; ?>" alt="">
    </div>
    <h5>Product Id:<span class="dt-value"> <?php echo $product_id ?> </span></h5>
    <h5>Product Name:<span class="dt-value"> <?php echo $product_name ?> </span></h5>
    <h5>Brand:<span class="dt-value"> <?php echo $product_brand ?> </span></h5>
    <h5>Product Price:<span class="dt-value"> <?php echo$product_price ?> &dollar;</span></h5>
    <h5>Discount:<span class="dt-value"> <?php echo $product_discount ?> %</span></h5>
    <h5>Final Price:<span class="dt-value"> <?php echo $product_fprice ?> &dollar;</span></h5>
</body>
</html>