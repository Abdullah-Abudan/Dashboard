<?php
	include("./config/constants.php");
	include("./config/check_elogin.php");
?>

<?php
if(isset($_SESSION['product'])){
  echo $_SESSION['product'];
  unset($_SESSION['product']); 
}
?>

<style>
.admin{
    display: none;
    }
</style>

<!DOCTYPE html>
<html lang="en">
<body>
  <div class="d-flex mb-3 align-items-center" id="head-sec">

    <div class="p-2">
      <h2>All Products</h2>
    </div> 
    <div class="p-3"> 
      <a class="btn btn-success" href="add-product.php" role="button">Add new</a>
    </div>

    <div class="row ms-auto">
      <div class="col-md-12">
        <form class="d-flex" action="product-search.php" method="POST">
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
        <th scope="col" colspan="2">Action</th>
      </tr>
    </thead>
    <tbody id="myTable">
    <?php
    $_SESSION['eid'];
    $eid=$_SESSION['eid']; #بهدف الوصول لل آي دي تبع الايمبلوي يلي سجل دخول للصفحة
    $q="SELECT * FROM product WHERE eid='$eid'";
    $res=mysqli_query($conn,$q);
    if($res && $res->num_rows>0){
      while ($data=$res->fetch_assoc())
      {
        echo
        "<tr>
        <td><img src='".$data['img_src']."' height='48px' width='48px'/></td>
        <td>".$data['pid']."</td>
        <td>".$data['pname']."</td>
        <td>".$data['brand']."</td>
        <td>".$data['price']." &dollar;</td>
        <td>".$data['discount']." %</td>
        <td>".$data['fprice']." &dollar;</td>
        <td>
        <a href='edit-p.php?pid=$data[pid]'>
        <span>Edit</span>
        </a>
        </td>
        <td>
        <a href='delete-p.php?pid=$data[pid]'>
        <button> Delete </button>
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