<?php 
require_once 'bootstrap.php';

if(isUserLoggedIn()){
    $template_data["notifications"] = $dbh->getNotificationsByUserId($_SESSION['user']['idUSER']); 
}