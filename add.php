<?php
session_start();
include "db.php";

$user_id = 1; // contoh user id
$product_id = intval($_POST['product_id']);
$quantity = intval($_POST['quantity'] ?? 1);

$check = mysqli_query($conn,
  "SELECT * FROM cart WHERE user_id='$user_id' AND product_id='$product_id'");

if (mysqli_num_rows($check) > 0) {
  mysqli_query($conn,
    "UPDATE cart SET quantity = quantity + $quantity
     WHERE user_id='$user_id' AND product_id='$product_id'");
} else {
  mysqli_query($conn,
    "INSERT INTO cart (user_id, product_id, quantity)
     VALUES ('$user_id','$product_id','$quantity')");
}

header("Location: cart.php");
exit();
?>

