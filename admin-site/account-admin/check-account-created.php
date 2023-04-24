<?php

include "../server-connect.php";
include "../check-level.php";

if(isset($_POST['submit'])){
    session_start();
    if(isset($_SESSION["acces_level"])){
        $creat_username = $_POST['creatusername'];
        $creat_password = $_POST['creatpassword'];
        $administration_level = $_POST['administration-level'];
        echo $creat_password;
    
        if($creat_username !== "" && $creat_password !== "") {
            $stmt = $con->prepare("SELECT id, username, user_password from account where username = ?");
            $stmt->bind_param("s", $creat_username);
            $stmt->execute();
            $result = $stmt->get_result();
    
            if (!mysqli_num_rows($result) > 0) {
                $hash_password = password_hash($creat_password, PASSWORD_DEFAULT);//: string
                $insert_account = "insert into account (username, user_password, acces_level) values('$creat_username', '$hash_password', '$administration_level')";
                $append_account = mysqli_query($con, $insert_account);
                header("location: creat-account.php?error=none");
                
            }else{
                header("location: creat-account.php?error=exists");
            }
    
        }else {
                header("location:creat-account.php?error=empty");
            }
    
    }
    else{
        echo "To low administration level";
    }
}   


$con->close();
