<?php
require_once 'bootstrap.php';

if(isUserLoggedIn()){
    //Home
    $templateParams["titolo"] = "Home";
    $templateParams["nome"] = "home.php";
    $templateParams["users"] = $dbh->getUsers();
    $templateParams["posts"] = $dbh->getPosts();
}else{
    //Login
    $templateParams["titolo"] = "Login";
    $templateParams["nome"] = "login-form.php";
}

require 'template/layout.php';