<?php
$page_title = "add-product"; 
	include("./config/constants.php");
	include("./config/check_elogin.php");
?>

<style>
.admin{
  display: none;
  }
</style>

<?php
	$_SESSION['eid']; 
	$eid=$_SESSION['eid']; #for Employee Id 

  // fetch brand options
  $bq ="SELECT brand_name FROM brand";
  $bres = mysqli_query($conn,$bq);
  if($bres && $bres->num_rows> 0){
    while($options = $bres ->fetch_assoc()){
      $brand_name[] = $options['brand_name'];#مصفوفة بها كل أسماء البراندات يلي لفيت عليهم 
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<body onload="discount()" >
    <div class="d-flex mb-3">
      <div class="p-2">
        <h1>Add Product</h1>
      </div>
      
      <div class="p-3">
        <a class="btn btn-primary" href="productlist.php" role="button">All Products</a>
      </div>    
    </div>
    <br>
   
    <form action="" id="jform" method="POST" enctype="multipart/form-data">
      <label for="emid" class="form-label">Employee Id</label> 
      <input name="emid" id="emid" class="form-control form-control-sm" type="text" value="<?php echo $eid; ?> " aria-label=".form-control-sm example" readonly>
      <br>
      
      <label for="pid" class="form-label">Product Id</label>
      <input name="pid" id="pid" class="form-control form-control-sm" type="text" placeholder="Enter product Id" aria-label=".form-control-sm example" required>
      <br>
      
      <label for="pname" class="form-label">Product Name</label>
      <input name="pname" id="pname" class="form-control form-control-sm" type="text" placeholder="Enter product name" aria-label=".form-control-sm example" required>
      <br>
     
      <label for="pbrand" class="form-label">Product Brand</label>
  
      <select name="brand_name" id="pbrand" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
        <option value="">Choose Brand</option>
        <?php 
          foreach ($brand_name as $option) {
            echo '<option value="'.$option.'"> '.$option.' </option>';
          }
        ?>
      </select>
      <br>
      
      <label for="image" class="form-label">Upload Image</label> 
      <div class="mb-3">   
        <input class="form-control form-control-sm" id="image" type="file" name="upload-file">
      </div>
      <br>
      
      <label for="pprice" class="form-label">Product Price</label>
      <input name="pprice" id="pprice" class="form-control form-control-sm" type="number" value="0" aria-label=".form-control-sm example" onchange="discount()" required>
      <br>
      
      <label for="pdis" class="form-label">Discount %</label>
      <input name="pdis" id="pdis" class="form-control form-control-sm" type="number" value="0" aria-label=".form-control-sm example" onchange="discount()" required>
      <br>
      
      <label for="pfinal" class="form-label">Final Price</label>
      <input name="pfinal" id="pfinal" class="form-control form-control-sm" type="number" aria-label=".form-control-sm example" onchange="discount()" readonly>
      <br>
      
      <input name="submit" class="btn btn-primary" type="submit" value="Submit" aria-label=".form-control-sm example">
    </form>


    <?php
        if(isset($_POST['submit']))
        {   
            $eid=$_POST['emid'];
            $pid=$_POST['pid'];
            $pname=$_POST['pname'];
            $pbr=$_POST['brand_name'];

            $filename = $_FILES["upload-file"]["name"];
            $tempname = $_FILES["upload-file"]["tmp_name"];
            $folder = "Images/Products/".$filename;
            move_uploaded_file($tempname,$folder); 

            $ppr=$_POST['pprice'];
            $pds=$_POST['pdis'];
            $pfpr=$_POST['pfinal'];

                $q="INSERT INTO product(eid, pid, pname, brand, img_src, price, discount, fprice) VALUES ('$eid','$pid','$pname','$pbr','$folder','$ppr','$pds','$pfpr')";
                $res=mysqli_query($conn,$q);
                if($res)
                {
                  echo "<script>alert('Record Added')</script>";
                  header("location:productlist.php");

                }                    
                else
                {
                  echo "<script>alert('Record Not Added')</script>";
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