<?php

//Ta bort användare genom att sätta kontot till false, alltså oaktivt
include "../server-connect.php";
if(isset($_POST['remove-submit'])){
    session_start();
    $level = $_SESSION["acces_level"];
    if($level == "administrat"){
        $user_remove_id = $_POST['id'];

        $remove = "UPDATE account SET account_activit_status = 'false' WHERE id = $user_remove_id";
        $appendRemovel = mysqli_query($con, $remove);
    }

    $con->close();

}