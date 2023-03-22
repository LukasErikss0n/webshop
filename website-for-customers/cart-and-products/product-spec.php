<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/universel.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/product-site.css">
</head>
<body>
    <?php
    include "../server-connect.php";

    $IdspecOfProduckt = $_GET['value'];

    $getMoreInfo = "SELECT id, user_id, file_name, description, title, price, status  from upload Where id = $IdspecOfProduckt ";
    $result = $con->query($getMoreInfo);


    $uppload = [];
    if (mysqli_num_rows($result) > 0) {
        while ($obj = mysqli_fetch_assoc($result)) {

            $fileName = $obj['file_name'];
            $id = $obj['id'];
            $dsc = $obj['description'];
            $title = $obj['title'];
            $price = $obj['price'];
            $status = $obj['status'];

            $uppload = [$fileName => [$dsc, $title, $price, $id, $status]];

            foreach ($uppload as $file => [$dsc, $title, $price, $id, $status]) {
            if($status == "Active" ){
                echo "<div class = 'info-side'>";
                echo "<a href = 'products.php' class = 'go-back return'>Go back</a>";
                echo "<div class = 'info-card-wrapper' >";
                echo "<img src = '../../admin-site/uploads/$file' alt = '$title' class = 'info-card-img'>";
                echo "<div class = 'product-info' >";
                echo "<h2>$title</h2>";
                echo "<p> $$price</p>";
                echo "<p>Tax included</p>";

                echo "<a href ='add-to-card.php?id=$id' class = 'btn-add-product'>Add card</a>";
                echo "</div>";
                echo "</div>"; 
                echo "</div>";
            }
            }  
        } 
    }
    $con->close();
    ?>
</body>
</html>

