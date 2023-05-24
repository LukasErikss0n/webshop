<?php

include "../server-connect.php";

if(isset($_POST['submit-img'])){

    //Tittar så att allt stämmer med bilden som ska bli den nya hero imgen på hemsidan
    session_start();
    $level = $_SESSION["acces_level"];
    if($level == "administrat"){
        
        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTempName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];


        $fileExtensionUpper = explode('.', $fileName);
        $fileActualExtensionLower = strtolower(end($fileExtensionUpper));

        $allowed = array ('jpg', 'png');

        if (in_array($fileActualExtensionLower, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 500000000) { 

                    $getOldImgUrl = "SELECT hero_img_url from heroimg WHERE id = 1 ";
                    $result = $con->query($getOldImgUrl);
                    //Tar bort gamla bilden från foldern på datorn
                    if (mysqli_num_rows($result) > 0) {
                        while ($obj = mysqli_fetch_assoc($result)) {

                            $imgUrl = $obj['hero_img_url'];
                            unlink("../uploads/".$imgUrl);                          
                        }
                    }

                    $fileDestination = '../uploads/' . $fileName;
                    move_uploaded_file($fileTempName, $fileDestination);

                    $img = "UPDATE heroimg SET hero_img_url = '$fileName' WHERE id = 1 ";
                    $appendRemovel = mysqli_query($con, $img);
                    
                    header("location: change-hero-img.php?imgupdated");

                } else {
                    header("location: change-hero-img.php?error=fileToBig");
                }
            }else {
                header("location: change-hero-img.php?error=401");
            }
        }else {
            header("location: change-hero-img.php?error=typeError");
        }

    }     
   
}
$con->close();
