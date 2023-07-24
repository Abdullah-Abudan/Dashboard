<?php
session_start(); // Start the session

if(isset($_GET['key'])) {
    $key = $_GET['key'];

    // Check if the key exists in the cart array
    if(isset($_SESSION['cart'][$key])) {
        // Remove the product from the cart
        unset($_SESSION['cart'][$key]);

        // Optional: Re-index the cart array
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
}

header("Location: cart.php"); // Redirect back to the cart page
?>
