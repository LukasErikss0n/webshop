<?php

//tittar level av användare för att skicka ut dem från obehöriga sidor
session_start();
$activ = $_SESSION["activ_status"];
if($activ != "true"){
    if($_SESSION["acces_level"] == "standard"){
        header("location: ../upload/upload-product.php");
    }
}

