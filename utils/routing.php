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

function homePage(){
    $dbh = new DatabaseHelper(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
   //Home
   $_SESSION['template']["titolo"] = "Home";
   $_SESSION['template']["nome"] = "home.php";
   $_SESSION['template']["posts"] = $dbh->getPostsVisibleToUserId($_SESSION['user']['idUSER']);
}

function usersPage(){
    $dbh = new DatabaseHelper(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
    
    //Follower/Following
    $_SESSION['template']["titolo"] = "Users";
    $_SESSION['template']["nome"] = "users.php";
    $_SESSION["template"]["following"] = $dbh->getActiveFollowedByUserId($_SESSION["user"]["idUSER"] );
 }

function profilePage($idUser){
    $dbh = new DatabaseHelper(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
   
    $selectedUser = $dbh->getUserByUserId($idUser);

    //selected user data
    $_SESSION['template']["userProfile"] = $selectedUser;
    $_SESSION['template']["posts"] = $dbh->getPostsByUserId($idUser);
    $_SESSION["template"]["following"] = $dbh->getActiveFollowedByUserId($selectedUser["idUSER"] );
    $_SESSION["template"]["followers"] = $dbh->getActiveFollowersByUserId($selectedUser["idUSER"] );

    $_SESSION['template']["titolo"] = "Profilo ".$selectedUser["nome"].' '.$selectedUser["cognome"];
    $_SESSION['template']["nome"] = "userProfile.php";
}