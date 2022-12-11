<?php
include "../server-connect.php";

if(isset($_POST['submit'])){
    $input_name = $_POST['username'];
    $input_password = $_POST['password'];
    

    $stmt = $con->prepare("SELECT id, username, user_password from account where username = ?");
    $stmt->bind_param("s", $input_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if (mysqli_num_rows($result) > 0) {
        $obj = mysqli_fetch_assoc($result);
        $name = $obj['username'];
        $id = $obj['id'];
        $password = $obj['user_password'];

        if($input_password === $password){

            session_start();
            $_SESSION["username"] = $input_name;
            $_SESSION["user_id"] = $id;
            header("location:../upload/logdin.php");

        }else{
            header("location: ../upload/admin-login.php?error=none");
           // echo "no account found by the name " . $input_name. " pleas try again ";
        }
         
    } else {
        header("location: ../upload/admin-login.php?error=none");
        //echo "no account found, incorrect password or username";
    }
    
    $con->close();

}