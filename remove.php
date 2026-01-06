<?php
include "db.php";
$user_id = 1;
$product_id = intval($_GET['product_id']);

mysqli_query($conn,
  "DELETE FROM cart WHERE user_id='$user_id' AND product_id='$product_id'");

header("Location: cart.php");
exit();
?>
