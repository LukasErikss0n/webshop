<?php

session_start();
if(!isset($_SESSION['username'])){
    header("location: ../account-admin/admin-login.php?error=notLogdin");
}