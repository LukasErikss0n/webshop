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
</head>
<body>
    <div class="wrapper-sections">
        <ul class = "wrapper-administrat">
            <li><a href="../upload/upload-product.php" class = "btn-styling-administration">Products</a></li>
            <li><a href="creat-account.php" class = "btn-styling-administration">Creat account</a></li>

            <?php
                $level = $_SESSION["acces_level"];
                if($level == "administrat"){
                    echo "<li><a href='remove-admin-or-update.php' class ='btn-styling-administration'>Remove account</a></li>";
                }
            
            ?>
           <div class="card-wrapper">
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