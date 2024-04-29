<?php
require_once 'bootstrap.php';

if(isUserLoggedIn()){
    //global user-data
    $_SESSION['template']["users"] = $_SESSION['dbh']->getUsers();
    $_SESSION['template']["notifications"] = $_SESSION['dbh']->getNotificationsByUserId($_SESSION['user']['idUSER']); 
    //switch template
    if(isset($_GET["page"])){
        switch($_GET["page"]){
            case "home":
            default:
                loadHome();
                break;
            case "logout":
                logOut();
                break;
            case "userProfile": 
                loadUserData($_GET["idUSER"]);
                break;
        }
    } else{
        loadHome();
    }
}else{
   loginPage();
}

function loginPage(){
    //Login
    $_SESSION['template']["titolo"] = "Login";
    $_SESSION['template']["nome"] = "login-form.php";
}

function loadHome(){
   //Home
   $_SESSION['template']["titolo"] = "Home";
   $_SESSION['template']["nome"] = "home.php";
   $_SESSION['template']["posts"] = $_SESSION['dbh']->getPostsVisibleToUserId($_SESSION['user']['idUSER']);
}

function loadUserData($idUser){
   $_SESSION['template']["titolo"] = "Profilo Utente";
   $_SESSION['template']["nome"] = "userProfile.php";
   //selected user data
   $_SESSION['template']["userProfile"] = $_SESSION['dbh']->getUserByUserId($idUser);
   $_SESSION['template']["posts"] = $_SESSION['dbh']->getPostsByUserId($idUser);
}

require 'template/layout.php';