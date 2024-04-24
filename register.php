<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Register";
$templateParams["nome"] = "registration-form.php";

if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["nome"]) && isset($_POST["cognome"])){
        $pwd = $_POST['password'];
        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        if(count($dbh->getUserByEmail($email))==0){
            $pepper = getPepper();
            $pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
            $pwd_hashed = password_hash($pwd_peppered, PASSWORD_DEFAULT);
            $dbh->insertUser($nome, $cognome,$email, $pwd_hashed);
            $templateParams["titolo"] = "Login";
            $templateParams["nome"] = "login-form.php";
         } else {
            $templateParams["erroreRegistrazione"] = "Email già registrata!";
         }
    } 
    require 'template/layout.php';

