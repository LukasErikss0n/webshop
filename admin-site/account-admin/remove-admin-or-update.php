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
    <title>Remove admin</title>
    <link rel="stylesheet" href="../css/file-css.css">
    <?php
        include "../favicon.php";
    ?>
</head>
<body>
<div class="wrapper-sections">
        <ul class = "wrapper-administrat">
            <li><a href="administrat.php" class = "btn-styling-administration">Go back</a></li>  
            
            <div class="card-wrapper">
                <h2>Delet user:</h2>
                <form action="user_removed.php" class="remove-form" method="post" enctype="multipart/form-data">
                        <select name="id" id="status">

                            <?php
                                include "../server-connect.php";
                                $admins = "SELECT * from  account WHERE account_activit_status = 'true'";
                                $result = $con->query($admins);
                    
                                if (mysqli_num_rows($result) > 0) {
                                    while ($obj = mysqli_fetch_assoc($result)) {
                    
                                        $id = $obj['id'];
                                        $username = $obj['username'];
                                        $acces_level = $obj['acces_level'];
                                
                                        $uppload = [$id => [$username, $acces_level]];
                    
                                        foreach ($uppload as $id => [$username, $acces_level]) {
                                            echo " <option value='$id'>$username</option>";
                                        }
                                    }
                                }
                                $con->close();
                            ?>
                        </select>
                        <input name="remove-submit" type="submit" value="Submit">
                </form>
           </div>
           <div class="card-wrapper">
                <h2>Update user:</h2>
                <form action="update-user.php" class="remove-form update-form" method="post" enctype="multipart/form-data">
                    <select name="id" id="status">
                        <?php
                            include "../server-connect.php";
                            $admins = "SELECT * from  account WHERE account_activit_status = 'true'";
                            $result = $con->query($admins);
                
                            if (mysqli_num_rows($result) > 0) {
                                while ($obj = mysqli_fetch_assoc($result)) {
                
                                    $id = $obj['id'];
                                    $username = $obj['username'];
                                    $acces_level = $obj['acces_level'];
                            
                                    $uppload = [$id => [$username, $acces_level]];
                
                                    foreach ($uppload as $id => [$username, $acces_level]) {
                                        echo " <option value='$id'>$username</option>";
                                    }
                                }
                            }
                            $con->close();
                        ?>
                    </select>
                    <label for="newName">New name</label>
                    <input type="text" name = "newName">
                    <label for="acces_level_new" >New administration level</label>  
                    <div>
                        <select name="acces_level_new" id="status">
                            <option value='administrat'>Administrat</option>";
                            <option value='moderator'>Moderator</option>";
                            <option value="standard">Standard</option>
                        </select>
                    </div>
                    <label for="password">New password</label>
                    <input type="password" name="password">

                    <input name="update-submit" type="submit" value="Submit">
                </form>
            </div>
        </ul>
        <div class="card-wrapper width">
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