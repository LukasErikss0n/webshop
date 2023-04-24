<?php

session_start();

if($_SESSION["acces_level"] != "Administrat"){
    header("location: ../upload/upload-product.php");
}