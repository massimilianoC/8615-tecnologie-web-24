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
    if(isset($_GET["page"])){
        switch($_GET["page"]){
            case 'register': 
                registerPage();
                break;
            case 'login':
            default:
                loginPage();
                break;
            }
        }
        else{
            loginPage();
        }
}

require 'template/layout.php';