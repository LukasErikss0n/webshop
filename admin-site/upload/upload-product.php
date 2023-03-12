<?php
include "../check-if-loggdin.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uppload - admin</title>
    <link rel="stylesheet" href="../css/file-css.css">
    <?php
    include "../favicon.php";
    ?>
</head>
<body>
    <div class="choose-wrapper">
        <div class="options">
            <a href="../gallary-changes/products-uploaded.php" class = "log-out" >Gallary</a>
            <a href="../account-admin/loggout.php" class = "log-out">Log out</a>
        </div>
        <form action="controll-uploaded-product.php" method="POST" enctype="multipart/form-data" class = "product-form">
            <label for="file" class ="label-file">Välj bild</label>
            <input type="file" name="file"   class = "ghost">
            <label for="description" class = "label-file">Description</label>
            <input type="text" name = "description" >
            <label for="title" class = "label-file">Title</label>
            <input type="text" name = "title">
            <label for="price" class = "label-file">Price</label>
            <input type="text" name = "price">


            <label for="" class="label-file">Status of product</label>  
            <div>
                <select name="status" id="status">
                <option value="Hidden">Hidden</option>
                <option value="Active">Active</option>
            </select>
            <?php
                if(isset($_GET["error"])) {
                    if($_GET["error"] === "fileToBig"){
                    echo "<p class = 'error'>*The file is to big</p>";
                    }
                    else if($_GET["error"] === "401"){
                        echo "<p class = 'error'>*There where an error uploading, please try again</p>";
                    }
                    else if($_GET["error"] === "typeError"){
                        echo "<p class = 'error'>*The file typ is not allowed</p>";
                    }
                }
            ?>
            </div>

            <input type="submit" value="submit file" name="submit">
           
        </form>
       
    </div>
</body>
</html>