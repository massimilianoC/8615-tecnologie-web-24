<?php

if(isUserLoggedIn()){
    if(isset($_GET["page"])){
        switch($_GET["page"]){
            case 'logout':
                require('log-out.php');
                break;
            case 'userprofile': 
                require('user-profile.php');
                break;
            case 'users': 
                require('users.php');
                break;
            case 'home':
            default:
                require('home.php');
                break;
        }
    } else{
        require('home-page.php');
    }
}else{
    if(isset($_GET["page"])){
        switch($_GET["page"]){
            case 'register': 
                require('register.php');
                break;
            case 'login':
            default:
            require('login.php');
                break;
            }
        }
        else{
            require('login.php');
        }
}


