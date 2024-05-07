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
    $_SESSION["template"]["following"] = $dbh->getActiveFollowedByUserId($_SESSION["user"]["idUSER"] );
 }

function loadUserData($idUser){
   $dbh = new DatabaseHelper("localhost", "root", "", "tecnologieweb2024", 3306);
   
   $selectedUser = $dbh->getUserByUserId($idUser);

   //selected user data
   $_SESSION['template']["userProfile"] = $selectedUser;
   $_SESSION['template']["posts"] = $dbh->getPostsByUserId($idUser);
   $_SESSION["template"]["following"] = $dbh->getActiveFollowedByUserId($_SESSION["user"]["idUSER"] );
   $_SESSION["template"]["followers"] = $dbh->getActiveFollowersByUserId($_SESSION["user"]["idUSER"] );

   $_SESSION['template']["titolo"] = "Profilo ".$selectedUser["nome"].' '.$selectedUser["cognome"];
   $_SESSION['template']["nome"] = "userProfile.php";
}