<?php
include "../server-connect.php";
if(isset($_POST['submit'])){
    session_start();
    $level = $_SESSION["acces_level"];
    $admin_removing_user_id = $_SESSION["admin_id"];
    if($level == "administrat"){
        $user_remove_id = $_POST['id'];

        $remove = "UPDATE account SET account_activit_status = 'false' WHERE id = $user_remove_id";
        $appendRemovel = mysqli_query($con, $remove);
    }

    $con->close();

    header("location: remove_admin.php?userDeleted");
}