<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/file-css.css">
    <title>creat account/admin</title>
</head>
<body>
    <div class = "go-back-wrapper">
     <a href="administrat.php" class="log-out">Go-back</a>
    </div>
<div class="wrapper">
        <h1>Sign up</h1>
        <form action="check-account-created.php" method="POST" enctype="multipart/form-data">
            <label for="creatusername">User name</label>
            <input type="text" name="creatusername" >
           <label for="creatpassword">Password</label>
           <input type="password" name="creatpassword" >
           <?php 
            if(isset($_GET["error"])) {
                if($_GET["error"] === "empty"){
                 echo "<p class = 'error'>*Please fill in username or password</p>";
                }
                else if($_GET["error"] === "exists"){
                    echo "<p class = 'error'>*Invalid username or password</p>";
                }
                else if($_GET["error"] === "none"){
                    echo "<p class = 'none'>*Uppload success</p>";
                }
            } 
        ?>
           <input name="submit" type="submit" value="Submit">
        </form>
      
    </div>
</body>
</html>