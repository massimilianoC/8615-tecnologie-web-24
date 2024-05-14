<?php 
require_once 'bootstrap.php';

$template_data["notifications"] = $dbh->getNotificationsByUserId($_SESSION['user']['idUSER']); 