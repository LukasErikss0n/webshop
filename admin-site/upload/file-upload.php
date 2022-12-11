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


        $stmt = $con->prepare("SELECT id, username from account where username = ?");
        $stmt->bind_param("s", $_SESSION['username']);
        $stmt->execute();
        $result = $stmt->get_result();

        $id;
        if (mysqli_num_rows($result) > 0) {
            $obj = mysqli_fetch_assoc($result);
            $id = $obj['id'];
        }

        if (in_array($fileActualExtensionLower, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 500000000) { //ta bort 2 nollor

                    $fileDestination = 'uploads/' . $fileName;
                    move_uploaded_file($fileTempName, $fileDestination);

                    $insertTitle = "insert into upload (user_id, file_name, description, title, price, status) values('$id', '$fileName', '$description', '$title', '$price', '$status')";
                    $appendTitle = mysqli_query($con, $insertTitle);
                    header("location:../gallary-changes/upload.php?upploadsuccess");

                } else {
                    echo "your file is to big";
                }
            }else {
                echo "there was an error uploading your file";
            }
        }else {
            echo "you cannot upload files of this type";
        }

    }




}else{
    echo "please login before you uppload";
}





