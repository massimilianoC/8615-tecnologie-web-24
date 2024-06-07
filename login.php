<?php
require_once 'bootstrap.php';

$template_data["titolo"] = "Login";
$template_data["nome"] = "login-form.php";

if(isset($_POST["email"]) && isset($_POST["password"])){
    $plainPassword = $_POST["password"];
    $login_result = $dbh->getUserByEmail($_POST["email"]);

    if(count($login_result)==0){
        $_SESSION["errorelogin"] = "Errore! Controllare email o password!";
        require 'template/base-layout.php';
    }
    else{
        $user = $login_result[0];
        $pepper = getPepper();
        $pwd = $_POST['password'];
        $pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
        $pwd_hashed = $user["password"];
        if (password_verify($pwd_peppered, $pwd_hashed)) {
            registerLoggedUser($user);
            header('Location: index.php?page=home');
        }
        else {
            $_SESSION["errorelogin"] = "Hai dimenticato la password?";
            require 'template/base-layout.php';
        }
    }
}

