<?php
require_once 'bootstrap.php';

if(isset($_POST["email"]) && isset($_POST["password"])){
    $login_result = $dbh->login($_POST["email"], $_POST["password"]);
    if(count($login_result)==0){
        //Login fallito
        $templateParams["errorelogin"] = "Errore! Controllare email o password!";
    }
    else{
        registerLoggedUser($login_result[0]);
    }
}


if(isUserLoggedIn()){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    /*
    $templateParams["titolo"] = "Home";
    $templateParams["nome"] = "home.php";
    $templateParams["users"] = $dbh->getUsers();
    $templateParams["posts"] = $dbh->getPosts();
    if(isset($_GET["formmsg"])){
        $templateParams["formmsg"] = $_GET["formmsg"];
    }
    */
}
else{
    header('Location: index.php');
}
