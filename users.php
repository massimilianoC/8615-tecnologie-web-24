<?php
require_once 'bootstrap.php';

//Follower/Following
    $template_data["titolo"] = "Users";
    $template_data["nome"] = "users-page.php";
    $template_data["following"] = $dbh->getActiveFollowedByUserId($_SESSION["user"]["idUSER"] );
