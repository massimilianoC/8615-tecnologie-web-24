<?php 
require_once 'bootstrap.php';

if(isset($_POST['idNOTIFICATION'])){
    $currentDate = date('Y-m-d H:i:s');
    $dbh->updateNotification($currentDate,$currentDate,1,$_POST['idNOTIFICATION']);
    echo count($dbh->getNotificationsByUserId($_SESSION["user"]["idUSER"]));
}

if(isUserLoggedIn()){
    $template_data["notifications"] = $dbh->getNotificationsByUserId($_SESSION['user']['idUSER']); 
}