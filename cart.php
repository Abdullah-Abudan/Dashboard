<?php
$page_title = "cart"; 
include("./config/constants.php");
include("./config/check_elogin.php");

// Check if the cart is empty
if(empty($_SESSION['cart'])) {
    echo "<p>Your cart is empty.</p>";
} else {
    echo "<h1 class='mb-4'>Shopping Cart</h1>";
    echo "<table>";
    echo "<tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Brand</th>
            <th>Product Price</th>
            <th>Product dis-Price</th>
            <th>Product f-Price</th>
            <th>Product Image</th>
            <th>Action</th>
        </tr>";

    // Loop through the cart items and display them
    foreach($_SESSION['cart'] as $key => $item) {
        $product_id = $item['pid'];
        $product_name = $item['pname'];
        $product_brand = $item['brand'];
        $product_image = $item['img_src'];
        $product_price = $item['price'];
        $product_discount = $item['discount'];
        $product_fprice = $item['fprice'];

        echo "<tr>
                <td>$product_id</td>
                <td>$product_name</td>
                <td>$product_brand</td>
                <td>$product_price $</td>
                <td>$product_discount $</td>
                <td>$product_fprice $</td>
                <td><img src='$product_image' height='50px' weight='50px' alt='...'></td>
                <td><a href='remove-from-cart.php?key=$key' class='text-decoration-none'>Remove</a></td>
            </tr>";
    }

    echo "</table>";
}
?>


<style>
.admin{
  display: none;
  }
</style>
