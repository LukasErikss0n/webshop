<?php
include "../check-if-loggdin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/file-css.css">
    <title>Administration</title>
    <?php
    include "../favicon.php";
    include "../check-level.php";
    ?>
    <script src="https://kit.fontawesome.com/62db96ebb4.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper-sections">
        <ul class = "wrapper-administrat">
            <li><a href="../upload/upload-product.php" class = "btn-styling-administration">Home <i class="fa-solid fa-house"></i></i></a></li>
            <li><a href="creat-account.php" class = "btn-styling-administration">Creat account <i class="fa-solid fa-plus"></i></a></li>

            <?php

            //hantering av olika levlar av admin, olika namn på samma sida för förtydligen(har inte samma saker på samma sida)
            //vissar bara om man är admin eller moderator
                $level = $_SESSION["acces_level"];
                if($level == "administrat" or $level == "moderator"){
                    $name = "Remove / Edit account <i class='fa-solid fa-pen-to-square'></i>";
                    if ($level == "moderator"){
                        $name = "Edit account <i class='fa-solid fa-pen-to-square'></i>";
                    }
                    echo "<li><a href='remove-admin-or-update.php' class ='btn-styling-administration'>$name</a></li>";
                    if($level == "administrat"){
                        echo "<li><a href='change-hero-img.php' class ='btn-styling-administration'>Change Hero-img <i class='fa-regular fa-image'></i></a></li>";
                    }
                }
            
            ?>
           <div class="card-wrapper">

               <!-- Se vem man är inloggad som-->
            <h2>Logged in as:</h2>
            <?php
               $name = $_SESSION["username"];
                $user_level = $_SESSION["acces_level"];
                
                echo "<div class ='card-user'>";
                echo "<h3>$name</h3>";
                echo "<p>$user_level</p>";
                echo "</div>";

            ?>
           </div>
        </ul>
        <div class="card-wrapper">
            <h2>Admin users:</h2>
            <?php
            //Vissar alla admins som finns 
            include "../server-connect.php";
            $user = "SELECT * from  account WHERE account_activit_status = 'true'";
            $result = $con->query($user);

            if (mysqli_num_rows($result) > 0) {
                while ($obj = mysqli_fetch_assoc($result)) {

                    $id = $obj['id'];
                    $username = $obj['username'];
                    $acces_level = $obj['acces_level'];
            
                    $uppload = [$id => [$username, $acces_level]];

                    foreach ($uppload as $id => [$username, $acces_level]) {
                        echo "<div class ='card-user'>";
                        echo "<h3>$username</h3>";
                        echo "<p>$acces_level</p>";
                        echo "</div>";
                    }
                }
            }
            $con->close();
            ?>
        </div>
    </div>
</body>
</html>