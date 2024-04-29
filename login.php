<?php
require_once 'bootstrap.php';

if(isset($_POST["email"]) && isset($_POST["password"])){
    $plainPassword = $_POST["password"];
    $login_result = $_SESSION['dbh']->getUserByEmail($_POST["email"]);

    if(count($login_result)==0){
        //Login fallito
        $_SESSION['template']["errorelogin"] = "Errore! Controllare email o password!";
    }
    else{
        $user = $login_result[0];
        $pepper = getPepper();
        $pwd = $_POST['password'];
        $pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
        $pwd_hashed = $user["password"];
        if (password_verify($pwd_peppered, $pwd_hashed)) {
            //echo "Password matches.";
            registerLoggedUser($user);
        }
        else {
            $_SESSION['template']["errorelogin"] = "Hai dimenticato la password?";
        }
       
    }
}

header('Location: index.php');
