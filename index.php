<?php
require_once 'bootstrap.php';

if(isUserLoggedIn()){
    //Home
    $templateParams["titolo"] = "Home";
    $templateParams["nome"] = "home.php";
    $templateParams["users"] = $dbh->getUsers();
    $templateParams["posts"] = $dbh->getPostsVisibleToUserId($_SESSION['user']['idUSER']);
    $templateParams["notifications"] = $dbh->getNotificationsByUserId($_SESSION['user']['idUSER']); 
}else{
    //Login
    $templateParams["titolo"] = "Login";
    $templateParams["nome"] = "login-form.php";
}

require 'template/layout.php';