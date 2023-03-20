<?php
include "../server-connect.php";
session_start();
if (isset($_SESSION["username"])) {
    if(isset($_POST['update'])){

         
        $file = $_FILES['file'];

        $description = $_POST['description'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        $status = $_POST['status'];

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

                    $idOfAdmin = $_SESSION['user_id'];
                    $idProduct = $_SESSION["change-id-product"];

                    $getOldImgUrl = "SELECT file_name from upload WHERE id = $idProduct";
                    $result = $con->query($getOldImgUrl);
                    if (mysqli_num_rows($result) > 0) {
                        while ($obj = mysqli_fetch_assoc($result)) {
                            $imgUrl = $obj['file_name'];
                            //$_SESSION['file_name'] = $imgUrl;

                            unlink("../uploads/".$imgUrl);

                          
                        }
                    }

                   
                    $fileDestination = '../uploads/' . $fileName;
                    move_uploaded_file($fileTempName, $fileDestination);

                    $insertTitle = "UPDATE upload SET user_id = $idOfAdmin, file_name = '$fileName', description = '$description', title = '$title', price = $price, status = '$status' WHERE id = $idProduct ";
                    $appendTitle = mysqli_query($con, $insertTitle);
                    
                    header("location:../gallary-changes/products-uploaded.php?upploadsuccess");

                } else {
                    header("location:../gallary-changes/update-product.php?error=fileToBig");
                }
            }else {
                header("location:../gallary-changes/update-product.php?error=401");
            }
        }else {
            header("location:../gallary-changes/update-product.php?error=typeError");
        }

    }

}else{
    header("location: ../account-admin/admin-login.php?error=notLogdin");
}