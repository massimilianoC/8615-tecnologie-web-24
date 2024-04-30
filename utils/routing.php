<?php 
function loginPage(){
    //Login
    $_SESSION['template']["titolo"] = "Login";
    $_SESSION['template']["nome"] = "login-form.php";
}

function registerPage(){
    $_SESSION['template']["titolo"] = "Register";
    $_SESSION['template']["nome"] = "registration-form.php";
}

function loadHome(){
   $dbh = new DatabaseHelper("localhost", "root", "", "tecnologieweb2024", 3306);
   //Home
   $_SESSION['template']["titolo"] = "Home";
   $_SESSION['template']["nome"] = "home.php";
   $_SESSION['template']["posts"] = $dbh->getPostsVisibleToUserId($_SESSION['user']['idUSER']);
}

function loadUsers(){
    $dbh = new DatabaseHelper("localhost", "root", "", "tecnologieweb2024", 3306);
    
    //Follower/Following
    $_SESSION['template']["titolo"] = "Users";
    $_SESSION['template']["nome"] = "users.php";
    $_SESSION["template"]["following"] = $dbh->getFollowedByUserId($_SESSION["user"]["idUSER"] );
 }

function loadUserData($idUser){
   $dbh = new DatabaseHelper("localhost", "root", "", "tecnologieweb2024", 3306);
   
   $_SESSION['template']["titolo"] = "Profilo Utente";
   $_SESSION['template']["nome"] = "userProfile.php";

   //selected user data
   $_SESSION['template']["userProfile"] = $dbh->getUserByUserId($idUser);
   $_SESSION['template']["posts"] = $dbh->getPostsByUserId($idUser);
   $_SESSION["template"]["following"] = $dbh->getFollowedByUserId($_SESSION["user"]["idUSER"] );
   $_SESSION["template"]["follower"] = $dbh->getFollowerByUserId($_SESSION["user"]["idUSER"] );
}