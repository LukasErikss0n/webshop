<?php

include "../server-connect.php";

if(isset($_POST['update-submit'])){
    session_start();
    $level = $_SESSION["acces_level"];
    if($level == "administrat"){
        $user_update_id = $_POST['id'];

        $newUsername = $_POST['newName'];
        $newAdministrationLevel = $_POST['acces_level_new'];
        $newPassword = $_POST['password'];

        $hash_password = password_hash($newPassword, PASSWORD_DEFAULT);

        $remove = "UPDATE account SET username = '$newUsername', user_password = '$hash_password', acces_level = '$newAdministrationLevel' WHERE id = $user_update_id ";
        $appendRemovel = mysqli_query($con, $remove);
    }

    $con->close();

   header("location: remove-admin-or-update.php?userUpdated");
}

