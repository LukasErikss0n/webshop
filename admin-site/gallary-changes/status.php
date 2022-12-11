<?php
include "../server-connect.php";


if(isset($_POST['confirmed-del'])){
    
    $checkboxes = $_POST['del-status'];

    for ($i=0; $i < sizeof($checkboxes); $i++) { 
        $round = $checkboxes[$i];
        $remove = "DELETE FROM upload WHERE id = $round";
        $appendRemovel = mysqli_query($con, $remove);
    }
    header("location: upload.php");

} else if(isset($_POST['abort'])){
    header("location: upload.php");

}else if(isset($_POST['active'])){
    $checkboxes = $_POST['del-status'];

    $value = "Active";

    for ($i=0; $i < sizeof($checkboxes); $i++) { 
        $round = $checkboxes[$i];
        $change = "UPDATE upload SET status = '$value' WHERE id = '$round'";
        $appendRemovel = mysqli_query($con, $change);
    }
    
    header("location: upload.php");
    

}else if(isset($_POST['hidden'])){
    $checkboxes = $_POST['del-status'];
    $value = "Hidden";

    for ($i=0; $i < sizeof($checkboxes); $i++) { 
        $round = $checkboxes[$i];
        $change = "UPDATE upload SET status = '$value' WHERE id = '$round'";
        $appendRemovel = mysqli_query($con, $change);
    }
    header("location: upload.php");
    
}

    

  
   // header("location: upload.php");
