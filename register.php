<?php
require_once 'bootstrap.php';

if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["nome"]) && isset($_POST["cognome"])){
    $pepper = getPepper();
    $pwd = $_POST['password'];
    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
    $pwd_hashed = password_hash($pwd_peppered, PASSWORD_DEFAULT);
    $dbh->insertUser($nome, $cognome,$email, $pwd_hashed);
    } else{ 
        //Register
        $templateParams["titolo"] = "Register";
        $templateParams["nome"] = "registration-form.php";
    }
    require 'template/layout.php';

