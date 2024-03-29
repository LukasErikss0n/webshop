<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php 
   include "favicon.php";
  ?>
  <link rel="stylesheet" href="css/universel.css">
  <link rel="stylesheet" href="css/cart.css">
  <title>Shopping cart</title>
  <script src="https://kit.fontawesome.com/62db96ebb4.js" crossorigin="anonymous"></script>
</head>
<body>
<?php

include "server-connect.php";

session_start();

$id = $_GET['id']; 

$getCartProducts = "SELECT * from upload Where id = $id and status = 'Active' ";
$result = $con->query($getCartProducts);

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
//läger till produkter i en kart om man klickar på add to kart knapp, läger till i en seassion
if (mysqli_num_rows($result) > 0) {
    while ($obj = mysqli_fetch_assoc($result)) {
        $id = $obj['id'];
        $img_url = $obj['file_name'];
        $title = $obj['title'];
        $dsc = $obj['description'];
        $price = $obj['price'];
        $click = $obj['click'];

        $click += 1;
        //uppdaterar produktens populäritet för att kunna vissa dem top 10 produkter på första sida
        $updatepopularity = "UPDATE upload SET click = $click  WHERE id = $id ";
        $appendRemovel = mysqli_query($con, $updatepopularity);



        if (isset($cart[$id])) {
            if (isset($_GET['remove_id']) && $_GET['remove_id'] == $id) {
                unset($cart[$id]);
            }
        } else {
            $cart[$id] = [
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

if (!empty($_POST['productId']) && !empty($_POST['quantity'])) {
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];

    if (isset($cart[$productId])) {
        $cart[$productId]['quantity'] = $quantity;
    }
}

$_SESSION['cart'] = $cart;

echo "<div class ='btn-back'>";
echo "<a href='products.php'>Go back</a>";
echo "</div>";

echo "<div class='wrapper-h1'><h1>Shopping Cart</h1></div>";

if (!empty($cart)) {
    echo "<table>";
    /*echo "<tr>";
    echo "<th></th>";
    echo "<th>Title</th>";
    echo "<th>Quantity</th>";
    echo "<th>Price</th>";
    echo "<th></th>";
    echo "</tr>";*/
    $totalPrice = 0;
    foreach ($cart as $product) {
        echo "<tr>";
        echo "<td class='td-img'><img src='admin-site/uploads/$product[img_url]'></td>";
        echo "<td><p class='name-product'>$product[title]</p></td>";
        
        echo "<td>";
        echo "<select name='' id='' data-qty-update-product-id='$product[product_id]' onchange='updateQuantity(this)'>";
        for ($i = 1; $i <= 4; $i++) {
            $selected = ($i == $product['quantity']) ? 'selected' : '';
            echo "<option value='$i' $selected>$i</option>";
        }
        echo "</select>";
        echo "</td>";
        echo "<td><p class='name-product'>" . ($product['price'] * $product['quantity']) . " kr</p></td>";
        echo "<td><a href='add-to-card.php?id=$product[product_id]&remove_id=$product[product_id]'> <i class='fa-regular fa-trash-can' style='color: #ff0000; font-size: 20px;'></i></a></td>";
        echo "</tr>";
        $totalPrice += $product['price'] * $product['quantity'];
    }
    echo "</table>";
    echo "<p class='totalprice'>Totalprice: $totalPrice kr</p>";

    //On checkout check if product is activ, if not, error. 

} else {
    echo "<p class='empty'>Your cart is empty.</p>";
}
$con->close();
?>
<!--ändrar quantity för produkt onchange()!-->
<script>
function updateQuantity(input) {
    var productId = input.getAttribute('data-qty-update-product-id');
    var quantity = input.value;

    var form = document.createElement('form');
    form.method = 'POST';
    form.action = '';  // You might want to set the correct action URL here
    form.style.display = 'none';

    var productIdInput = document.createElement('input');
    productIdInput.type = 'hidden';
    productIdInput.name = 'productId';
    productIdInput.value = productId;
    form.appendChild(productIdInput);

    var quantityInput = document.createElement('input');
    quantityInput.type = 'hidden';
    quantityInput.name = 'quantity';
    quantityInput.value = quantity;
    form.appendChild(quantityInput);

    document.body.appendChild(form);
    form.submit();
}
</script>
</body>
</html>

