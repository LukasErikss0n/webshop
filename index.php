<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/start-page.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/universel.css">
    <?php
      include "favicon.php";
    ?>
 </head>
  <body>
    <?php
      include "nav-menu.php";
    ?>
    <script src="js/hamburger.js"></script>
    <main>
      <section>
        <div>
          <?php
          include "server-connect.php";
            $grab_data = "SELECT * from heroimg WHERE id = 1";
            $result = $con->query($grab_data);

            if (mysqli_num_rows($result) > 0) {
              $obj = mysqli_fetch_assoc($result);
              $urlName = $obj['hero_img_url'];
              $fullUrl = "admin-site/uploads/$urlName";
            }
        
          ?>
          <img class="hero-imgage-home" src="<?php echo $fullUrl ?>" alt="">
          <div class="hero-text-home center-item">
            <h1 class="nextmove-gradient">Nextmove</h1>
            <p>Welcome to where we fullfille dreams</p>
            <a href="products.php">Shop now</a>
          </div>
        </div>
      </section>
  </body>
</html>
