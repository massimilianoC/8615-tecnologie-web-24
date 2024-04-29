<?php
require_once 'bootstrap.php';

if(isUserLoggedIn()){
    //global user-data
    $_SESSION['template']["users"] = $dbh->getUsers();
    $_SESSION['template']["notifications"] = $dbh->getNotificationsByUserId($_SESSION['user']['idUSER']); 
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

require 'template/layout.php';