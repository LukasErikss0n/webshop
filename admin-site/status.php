<?php
include "server-connect.php";
session_start();


if(isset($_POST['del'])){
    
    $checkboxes = $_POST['del-status'];

    for ($i=0; $i < sizeof($checkboxes); $i++) { 
        $round = $checkboxes[$i];
        $remove = "DELETE FROM upload WHERE id = $round";
        $appendRemovel = mysqli_query($con, $remove);
    }
    header("location: upload.php");

}else if(isset($_POST['status'])){
    $_SESSION["check"] =  $_POST['del-status'];

   header("location: change-status.php");
}
    
if(isset($_POST['active'])){
    $checkboxes = $_SESSION["check"];
    $value = "Active";

    for ($i=0; $i < sizeof($checkboxes); $i++) { 
        $round = $checkboxes[$i];
        $change = "UPDATE upload SET status = '$value' WHERE id = '$round'";
        $appendRemovel = mysqli_query($con, $change);
    }
    
    header("location: upload.php");
    

}else if(isset($_POST['hidden'])){
    $checkboxes = $_SESSION["check"];
    $value = "Hidden";

    for ($i=0; $i < sizeof($checkboxes); $i++) { 
        $round = $checkboxes[$i];
        $change = "UPDATE upload SET status = '$value' WHERE id = '$round'";
        $appendRemovel = mysqli_query($con, $change);
    }
    header("location: upload.php");
    
}

    

  
   // header("location: upload.php");
