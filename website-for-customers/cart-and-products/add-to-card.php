<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php 
   include "../favicon.php";
  ?>
  <link rel="stylesheet" href="../css/universel.css">
  <link rel="stylesheet" href="../css/cart.css">
  <title>Shopping cart</title>
</head>
<body>
<?php

include "../server-connect.php";

session_start();

$id = $_GET['id']; 

$getCartProducts = "SELECT id, user_id, file_name, description, title, price, status  from upload Where id = $id ";
$result = $con->query($getCartProducts);


if (mysqli_num_rows($result) > 0) {
  while ($obj = mysqli_fetch_assoc($result)) {
    $id = $obj['id'];
    $img_url = $obj['file_name'];
    $title = $obj['title'];
    $dsc = $obj['description'];
    $price = $obj['price'];
  
    if (isset($_SESSION['cart'][$id])) {
      $_SESSION['cart'][$id]['quantity']++;
      if(isset($_GET['remove_id']) && $_GET['remove_id'] == $id){
        unset($_SESSION['cart'][$id]);
      }
    }else {
      $_SESSION['cart'][$id] = [
        'product_id' => $id,
        'img_url' => $img_url,
        'title' => $title,
        'dsc' => $dsc,
        'quantity' => 1,
        'price' => $price,
       ];
    }
  }
  
}
echo "<a href= 'products.php'>Go back</a>";
echo "<h1>Shopping Cart</h1>";
if (!empty($_SESSION['cart'])) {
  echo "<table>";
  echo "<tr>";
  echo "<th></th>";
  echo "<th>Title</th>";
  echo "<th>quantity</th>";
  echo "<th>price</th>";
  echo "<th></th>";
  echo "</tr>";
  echo "<tr>";
  foreach ($_SESSION['cart'] as $product) {
    echo "<td class = 'td-img'><img src = '../../admin-site/uploads/$product[img_url] '  ></td>";
    echo "<td><h2>$product[title]</h2></td>";
    echo "<td>$product[quantity]</td>";
    echo "<td>$product[price]</td>";
    echo "<td><a href = 'add-to-card.php?id=$product[product_id]&remove_id=$product[product_id]'>remove</a></td>";
    echo "</tr>";   
  }
  echo "</table>";
} else {
  echo "<p class = 'emty'>Your cart is empty.</p>";
}




//header("location: product-spec.php?id=$product_id");

?>
</body>
</html>

