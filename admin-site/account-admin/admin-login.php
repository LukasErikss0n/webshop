<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin-loggin/nextmove</title>
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../css/style.css">
    <?php
    include "../favicon.php";
    ?>
</head>
<body>
    <div class="wrapper">
        <h1>Sign in</h1>
        <form action="check-account.php" method="POST" enctype="multipart/form-data">
            <label for="username">User name</label>
            <input type="text" name="username">
           <label for="password">Password</label>
           <input type="password" name="password">
           <?php 
            if(isset($_GET["error"])) {
                if($_GET["error"] === "none"){
                 echo "<p class = 'error'>*Incorrect password or username</p>";
                }
                else if($_GET["error"] === "invalid"){
                    echo "<p class = 'error'>*Invalid username or password</p>";
                }
            } 
        ?>
           <input name="submit" type="submit" value="Submit">
        </form>
    </div>
</body>
</html>