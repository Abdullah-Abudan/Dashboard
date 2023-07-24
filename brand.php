<?php
$page_title = "brand"; 
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

</head>
<body>
  <div class="d-flex mb-3" id="head-sec">
    <div class="p-2">
      <h2>All Brands</h2>
    </div> 

    <div class="p-3"> 
      <a class="btn btn-success" href="add-brand.php" role="button">Add new</a>
    </div>
    
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
        <th scope="col">Brand ID</th>
        <th scope="col">Brand Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody id="myTable">

      <?php         
        $q="SELECT * FROM brand";
        $data=mysqli_query($conn,$q);
        if($data && $data->num_rows){
          while ($res=$data->fetch_assoc()) 
          {
            echo "<tr>
            <td>".$res['id']."</td>
            <td>".$res['brand_name']."</td>
            <td>
                <a href='delete-brand.php?bid=$res[id]'>
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