<?php
require_once 'bootstrap.php';

$template_data["titolo"] = "Register";
$template_data["nome"] = "registration-form.php";
$dest = "home";

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
                $template_data["titolo"] = "Login";
                $template_data["nome"] = "login-form.php";
            } else {
                $template_data["erroreRegistrazione"] = $errors;
            }
         } else {
            $template_data["erroreRegistrazione"] = "Email già registrata!";
            $dest = "register";
         }
} 

header("Location: index.php?page=".$dest);

