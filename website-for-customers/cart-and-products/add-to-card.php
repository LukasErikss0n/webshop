<?php

include "../server-connect.php";

session_start();
$userId = 3;
$_SESSION["user_id"] = $userId;
$addToCardId = $_GET['id'];


$addToCart = "insert into cart (id_product,user_id) values('$addToCardId', '$userId')";
$append = mysqli_query($con, $addToCart);

header("location: product-spec.php?id=$addToCardId&addedSuccesfull");


/*

Nytt sätt att göra detta på gör det enklare då en seasion user id behövs inte då det är en seassion, funkar inte en

$product_id = $_GET['id']; 

$getMoreInfo = "SELECT id, user_id, file_name, description, title, price, status  from upload Where id = $product_id ";
$result = $con->query($getMoreInfo);

if (mysqli_num_rows($result) > 0) {
    while ($obj = mysqli_fetch_assoc($result)) {

        $fileName = $obj['file_name'];
        $dsc = $obj['description'];
        $title = $obj['title'];
        $price = $obj['price'];

        if(isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity'] += 1;
         
        } else {
            $_SESSION['cart'][$product_id] = array(
               'product_id' => $product_id,
               'img_url' => `$fileName`,
               'title' => `$title`,
               'dsc' => `$dsc`, 
               'quantity' => 1,
               'price' => $price 
            );
            
        }
        

        

    }
}





//header("location: product-spec.php?id=$product_id");
*/
    

