<?php
$page_title = "a-product-search"; 
  include("./config/constants.php");
  include("./config/check_alogin.php");
?>
<style>
.employee{
    display: none;
    }
</style>
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
        </tr>
    </thead>
    <tbody id="myTable">
    <?php  
    if(isset($_POST['search'])){
        $key_word = $_POST['search'];
        $q = "SELECT * FROM product WHERE pname LIKE '%$key_word%' OR brand LIKE '%$key_word%'";
        $res = mysqli_query($conn, $q);
        while ($data = $res->fetch_assoc()) {
            echo 
            "<tr>
            <td><img src='".$data['img_src']."' height='48px' width='48px'/></td>
            <td>".$data['pid']."</td>
            <td>".$data['pname']."</td>
            <td>".$data['brand']."</td>
            <td>".$data['price']." &dollar;</td>
            <td>".$data['discount']." %</td>
            <td>".$data['fprice']." &dollar;</td>
            </tr>";
        }
    }
    else
    {
        header("location: home.php");
    }  
    ?>
    </tbody>
</table>