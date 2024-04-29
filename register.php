<?php
require_once 'bootstrap.php';

$_SESSION['template']["titolo"] = "Register";
$_SESSION['template']["nome"] = "registration-form.php";

if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["nome"]) && isset($_POST["cognome"])){
        $pwd = $_POST['password'];
        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        if(count($_SESSION['dbh']->getUserByEmail($email))==0){
            $errors = checkPassword($pwd,"");
            if($errors==""){
                $pepper = getPepper();
                $pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
                $pwd_hashed = password_hash($pwd_peppered, PASSWORD_DEFAULT);
                $_SESSION['dbh']->insertUser($nome, $cognome,$email, $pwd_hashed);
                $_SESSION['template']["titolo"] = "Login";
                $_SESSION['template']["nome"] = "login-form.php";
            } else {
                $_SESSION['template']["erroreRegistrazione"] = $errors;
            }
         } else {
            $_SESSION['template']["erroreRegistrazione"] = "Email già registrata!";
         }
} 
require 'template/layout.php';

