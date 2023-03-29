<?php
    include "server-connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <?php
    include "favicon.php";
    ?>
    <link rel="stylesheet" href="css/universel.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/product-site.css">
</head>
<body>
    <?php 
        include "nav-menu.php";
    ?>
    <main>
        <div class="wrapper-of-products">
            <?php
            $grab_data = "SELECT id, user_id, file_name, description, title, price, status  from upload ";
            $result = $con->query($grab_data);

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
                        echo "<div class = 'card-wrapper' >";
                        echo "<img src = 'admin-site/uploads/$file' alt = '$title' value = '$id' class = 'img-start-side'>";

                        echo "<div class = 'info-wrapper' >";
                        echo "<p class = 'title' value = '$id'>$title</p>";
                        echo "<p class = 'price' value = '$id'>$$price</p>";
                        echo "</div>";
                        echo "</div>";
                       }
                    }  
                } 
            }
            $con->close();
            ?>
             <script src="js/event-of-products.js"></script>
        </div>
    </main>
</body>
</html>