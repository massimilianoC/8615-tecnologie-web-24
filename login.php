<?php
require_once 'bootstrap.php';

$template_data["titolo"] = "Login";
$template_data["nome"] = "login-form.php";
$routing = 'login';

if(isset($_POST["email"]) && isset($_POST["password"])){
    $plainPassword = $_POST["password"];
    $login_result = $dbh->getUserByEmail($_POST["email"]);

    if(count($login_result)==0){
        //Login fallito
        $template_data["errorelogin"] = "Errore! Controllare email o password!";
    }
    else{
        $user = $login_result[0];
        $pepper = getPepper();
        $pwd = $_POST['password'];
        $pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
        $pwd_hashed = $user["password"];
        if (password_verify($pwd_peppered, $pwd_hashed)) {
            registerLoggedUser($user);
            $routing = 'home';
        }
        else {
            $template_data["errorelogin"] = "Hai dimenticato la password?";
        }
    }
}

header('Location: index.php?page='.$routing);


