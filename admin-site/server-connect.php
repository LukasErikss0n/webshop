<?php

//kopplar till databasen

$servername = "localhost";
$username = "root";
$password = "";
$db = "myprojeckt";

$con = new mysqli($servername, $username, $password, $db);

if ($con->connect_error) {
    die("connection failed:" . $con->connect_error);
}


