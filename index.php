<?php
require_once 'bootstrap.php';

if(isUserLoggedIn()){
    //global user-data
    $_SESSION['template']["users"] = $dbh->getUsers();
    $_SESSION['template']["notifications"] = $dbh->getNotificationsByUserId($_SESSION['user']['idUSER']); 
    //switch template
    if(isset($_GET["page"])){
        switch($_GET["page"]){
            case 'logout':
                logOut();
                break;
            case 'userprofile': 
                loadUserData($_GET["iduser"]);
                break;
            case 'users': 
                loadUsers();
                break;
            case 'home':
                default:
                    loadHome();
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
   $dbh = new DatabaseHelper("localhost", "root", "", "tecnologieweb2024", 3306);
   //Home
   $_SESSION['template']["titolo"] = "Home";
   $_SESSION['template']["nome"] = "home.php";
   $_SESSION['template']["posts"] = $dbh->getPostsVisibleToUserId($_SESSION['user']['idUSER']);
}

function loadUsers(){
    $_SESSION['template']["titolo"] = "Users";
    $_SESSION['template']["nome"] = "users.php";
 }

function loadUserData($idUser){
   $dbh = new DatabaseHelper("localhost", "root", "", "tecnologieweb2024", 3306);
   $_SESSION['template']["titolo"] = "Profilo Utente";
   $_SESSION['template']["nome"] = "userProfile.php";
   //selected user data
   $_SESSION['template']["userProfile"] = $dbh->getUserByUserId($idUser);
   $_SESSION['template']["posts"] = $dbh->getPostsByUserId($idUser);
}

require 'template/layout.php';