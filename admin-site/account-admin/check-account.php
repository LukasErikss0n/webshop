<?php
include "../server-connect.php";

if(isset($_POST['submit'])){

    //tittar genom användar detaljer som försöker logga in som admin
    $input_name = $_POST['username'];
    $input_password = $_POST['password'];
    

    $stmt = $con->prepare("SELECT id, username, user_password, acces_level, account_activit_status from account where username = ?");
    $stmt->bind_param("s", $input_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if (mysqli_num_rows($result) > 0) {
        $obj = mysqli_fetch_assoc($result);
        $name = $obj['username'];
        $id = $obj['id'];
        $password = $obj['user_password'];
        $acces_level = $obj['acces_level'];
        $activ_status = $obj['account_activit_status'];

        


        if(password_verify($input_password, $password)){
           if($activ_status == "true"){ 
                session_start();
                $_SESSION["username"] = $input_name;
                $_SESSION["admin_id"] = $id;
                $_SESSION["acces_level"] = $acces_level;
                $_SESSION["activ_status"] = $activ_status;
                
                header("location:../upload/upload-product.php");
            }
            else{
                header("location: admin-login.php?error=notactiv"); 
            }
           

        }else{
            header("location: admin-login.php?error=none");
        }
         
    } else {
        header("location: admin-login.php?error=none");
    }
    
    $con->close();

}