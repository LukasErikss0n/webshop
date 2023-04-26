<?php

session_start();
$activ = $_SESSION["activ_status"];
if($activ != "true"){
    if($_SESSION["acces_level"] == "standard"){
        header("location: ../upload/upload-product.php");
    }
}
