<?php
require_once 'bootstrap.php';

$template_data["titolo"] = "Register";
$template_data["nome"] = "registration-form.php";

if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["nome"]) && isset($_POST["cognome"])){
    $pwd = $_POST['password'];
    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    if(count($dbh->getUserByEmail($email))==0){
        $errors = checkPassword($pwd,"");
        if($errors==""){
            $pepper = getPepper();
            $pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
            $pwd_hashed = password_hash($pwd_peppered, PASSWORD_DEFAULT);
            $dbh->insertUser($nome, $cognome,$email, $pwd_hashed);
            header("Location: index.php?page=login");
        } else {
            $_SESSION["alert"] = $errors;
            header("Location: index.php?page=register");
        }
    } else {
        $_SESSION["alert"] = "Email già registrata!";
        header("Location: index.php?page=register");
    }
}


