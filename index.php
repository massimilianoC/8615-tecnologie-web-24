<?php
require_once 'bootstrap.php';

if(isUserLoggedIn()){
    loadSessionUserData();

    //switch template
    if(isset($_GET["page"])){
        switch($_GET["page"]){
            case 'logout':
                logOut();
                break;
            case 'userprofile': 
                profilePage($_GET["iduser"]);
                break;
            case 'users': 
                usersPage();
                break;
            case 'home':
            default:
                homePage();
                break;
        }
    } else{
        homePage();
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