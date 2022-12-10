<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="change-status.css">
</head>
<body>
    <div class="wrapper">    
        <form action="status.php" method="POST" enctype="multipart/form-data">
            <button class="active"  type="submit" name="active">Active</button>
            <button class = "hidden" type="submit" name = "hidden" >Hidden</button>
        </form> 
    </div>   
</body>
</html>