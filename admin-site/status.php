<?php
include "server-connect.php";

if(isset($_POST['del'])){
    $checkboxes = $_POST['del-status'];

    for ($i=0; $i < sizeof($checkboxes); $i++) { 
        $round = $checkboxes[$i];
        $remove = "DELETE FROM upload WHERE id = $round";
        $appendRemovel = mysqli_query($con, $remove);
    }
    header("location: upload.php");
}