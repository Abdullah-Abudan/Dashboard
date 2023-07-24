<?php
$page_title = "shop"; 
include("./config/constants.php");
include("./config/check_elogin.php");

if(isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Retrieve product details from the database
    $q = "SELECT * FROM product WHERE pid='$product_id'";
    $res = mysqli_query($conn, $q);
    if($res && $res->num_rows == 1) {
        $data = $res->fetch_assoc();

        // Store product details in the session 
        $_SESSION['cart'][] = array(
            'pid' => $data['pid'],
            'pname' => $data['pname'],
            'brand' => $data['brand'],
            'img_src' => $data['img_src'],
            'price' => $data['price'],
            'discount' => $data['discount'],
            'fprice' => $data['fprice']
        );

        header("location: cart.php"); // Redirect to the cart page
    }
}
?>

<style>
.admin {
    display: none;
}
</style>

<html lang="en">
<body>
    <?php
    $q = "SELECT * FROM product";
    $res = mysqli_query($conn, $q);
    while ($data = $res->fetch_assoc()) {
        $pid = $data['pid'];
        $pname = $data['pname'];
        $pimg = $data['img_src'];
        $pprice = $data['price'];
        $pdis = $data['discount'];
        $pfinalp = $data['fprice'];
        echo "
        <a href='shop.php?id=$pid' class='text-decoration-none'> <!-- Add product ID to the link -->
            <div class='card' style='width: 18rem;'>
                <img src='$pimg' class='card-img-top' alt='...'>
                <div class='card-body'>
                    <h5 class='card-title'>$pname</h5>
                    <p class='card-text'><span class='price'>$pprice &dollar;</span><span class='discount'>$pdis% Off</span></p>
                    <p class='card-text'><span class='fprice'>$pfinalp &dollar;</span></p>
                    <form method='POST' action='shop.php?id=$pid'> <!-- Use form instead of anchor tag -->
                        <button type='submit' name='add_to_cart' class='btn btn-primary btn-sm'>Add to cart</button>
                    </form>
                </div>
            </div> 
        </a>";
    }

    // Process the form submission
    if(isset($_POST['add_to_cart'])) {
        $product_id = $_GET['id'];

        // Retrieve product details from the database
        $q = "SELECT * FROM product WHERE pid='$product_id'";
        $res = mysqli_query($conn, $q);
        if($res && $res->num_rows == 1) {
            $data = $res->fetch_assoc();

            // Store product details in the session or cookie
            $_SESSION['cart'][] = array(
                'pid' => $data['pid'],
                'pname' => $data['pname'],
                'brand' => $data['brand'],
                'img_src' => $data['img_src'],
                'price' => $data['price'],
                'discount' => $data['discount'],
                'fprice' => $data['fprice']
            );

            header("location: cart.php"); // Redirect to the cart page

        }
    }
    ?>
    <br>
</body>
</html>

<style>
.employee{
  display: none;
  }
</style>
