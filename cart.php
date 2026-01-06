<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your Cart</title>
  <link rel="stylesheet" href="cart.css">
</head>
<body>
  <div class="cart-wrapper">
    <h2 class="cart-title">Your Cart</h2>

    <?php
    session_start();
    include "db.php";

    $user_id = 1;
    $result = mysqli_query($conn,
      "SELECT cart.product_id, cart.quantity, products.product_name, products.price, products.image
       FROM cart
       JOIN products ON cart.product_id = products.product_id
       WHERE cart.user_id = '$user_id'");

    $total = 0;
    while ($row = mysqli_fetch_assoc($result)) {
    $subtotal = $row['price'] * $row['quantity'];
    $total += $subtotal;
    ?>
    <div class='cart-item'>
      <img src='images/<?php echo $row["image"]; ?>' 
           alt='<?php echo $row["product_name"]; ?>' 
           class='product-img'>
      <div class='item-details'>
        <h3><?php echo $row["product_name"]; ?></h3>
        <p>Quantity: <?php echo $row["quantity"]; ?></p>
        <p>Subtotal: RM<?php echo number_format($subtotal, 2); ?></p>
        <a class='remove-btn' href='remove.php?product_id=<?php echo $row["product_id"]; ?>'>Remove</a>
      </div>
    </div>
    <?php
}

    echo "<div class='cart-total'>Total: RM" . number_format($total, 2) . "</div>";
    ?>
  </div>

  <?php
$shipping = 10.00;
$grand_total = $total + $shipping;
?>


<?php
$shipping = 10.00;
$grand_total = $total + $shipping;
?>

<div class="cart-summary">
  <h3>Cart Summary</h3>
  <p>Subtotal: RM<?php echo number_format($total, 2); ?></p>
  <p>Shipping: RM<?php echo number_format($shipping, 2); ?></p>
  <p><strong>Grand Total: RM<?php echo number_format($grand_total, 2); ?></strong></p>
  <a href="checkout.php" class="checkout-btn">Proceed to Checkout</a>
</div>

<div class="cart-actions">
  <a href="index.php" class="btn-home">Go to Homepage</a>
</div>
