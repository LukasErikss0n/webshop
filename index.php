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
    <link rel="stylesheet" href="css/product-site.css">
    <link rel="stylesheet" href="css/footer.css">
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
      <section>
        <h2 class="top-val">Top 10 Products</h2>
        <div class="top-products-wrapper">
          <?php
            $grab_data = "SELECT * from upload Where status = 'Active' ORDER BY click DESC LIMIT 10" ;
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
                    $click = $obj['click'];
            
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
        </div>

      </section>
      <script src="js/event-of-products.js"></script>
  </body>
</html>
