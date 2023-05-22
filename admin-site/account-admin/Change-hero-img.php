<?php
session_start();

if($_SESSION["acces_level"] != "administrat"){
    header("location: ../upload/upload-product.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change hero img</title>
    <link rel="stylesheet" href="../css/file-css.css">
    <?php
        include "../favicon.php";
    ?>
</head>
<body>
        <!-- Ändra hero img på WEPSHOPs sidan!-->
    <li class ="go-back-hero"><a href="administrat.php" class = "btn-styling-administration">Go back</a></li>  
    <div class="wrapper-hero-img">
        <div class="card-wrapper hero-width">
            <h2>Hero img</h2>
            <form action="controll-hero-img-upload.php" class="remove-form" method="post" enctype="multipart/form-data">
                <label for="file" class ="label-file">Välj bild</label>
                <input type="file" name="file" class = "hero-file">
                <input name="submit-img" type="submit" value="Submit">
            </form>    
        </div>   
    </div>             
</body>
</html>