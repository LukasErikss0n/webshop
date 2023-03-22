<?php
    include "../server-connect.php";

    session_start();
    $userId = 3;
    $_SESSION["user_id"] = $userId;
    $addToCardId = $_GET['id'];


    $addToCart = "insert into cart (id_product,user_id) values('$addToCardId', '$userId')";
    $append = mysqli_query($con, $addToCart);

header("location: product-spec.php?value=$addToCardId");

    

