<?php
    include "../server-connect.php";

    session_start();
    $userId = 3;
    $_SESSION["user_id"] = $userId;
    $addToCardId = $_GET['id'];


    $datOfProduct = "SELECT * from upload ";
    $result = $con->query($datOfProduct);

    if (mysqli_num_rows($result) > 0) {
        while ($obj = mysqli_fetch_assoc($result)) {

            $fileName = $obj['file_name'];
            $id = $obj['id'];
            $dsc = $obj['description'];
            $title = $obj['title'];
            $price = $obj['price'];

            $addToCart = "insert into cart (user_id, file_name, description, title, price) values('$userId', '$fileName', '$dsc', '$title', '$price')";
            $append = mysqli_query($con, $addToCart);
        }
    }


header("location: product-spec.php?value=$addToCardId");

    

