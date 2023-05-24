<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['username'])){
    header("location: ../account-admin/admin-login.php?error=notLogdin");
}

//tittar om användare är inloggade