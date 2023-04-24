<?php
include "../server-connect.php";
session_start();
if (isset($_SESSION["username"])) {
    if(isset($_POST['submit'])){
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

                
                    $fileDestination = '../uploads/' . $fileName;
                    move_uploaded_file($fileTempName, $fileDestination);

                    $insertTitle = "insert into upload (user_id, file_name, description, title, price, status) values('$id', '$fileName', '$description', '$title', '$price', '$status')";
                    $appendTitle = mysqli_query($con, $insertTitle);
                    header("location:../gallary-changes/products-uploaded.php?upploadsuccess");

                } else {
                    header("location:../upload/upload-product.php?error=fileToBig");
                }
            }else {
                header("location:../upload/upload-product.php?error=401");
            }
        }else {
            header("location:../upload/upload-product.php?error=typeError");
        }

    }

}else{
    echo "please login before you uppload";
}

$con->close();




